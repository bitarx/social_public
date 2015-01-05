<?php
App::uses('ApiController', 'Controller');
/**
 * FriendInvites Controller
 *
 */
class FriendInvitesController extends ApiController {

    public $uses = array('SnsUser', 'User', 'FriendInvite', 'FriendInvitePresent', 'UserPresentBox');

    public static $inviteText = 'を一緒にプレイしましょう';

    public static $inviteSendText = 'へ招待メール送信の報酬';

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        $point = 1;
        $list = $this->FriendInvitePresent->getList($point);

        $inviteText = SITE_TITLE . self::$inviteText;

        $this->set('title', SNS_FRIEND_NAME . '招待');
        $this->set('list', $list);
        $this->set('subTitle',  SNS_FRIEND_NAME . '招待報酬');
        $this->set('action',  PLATFORM_URL . PLATFORM_INVITE_PATH . PLATFORM_APP_ID );
        $this->set('body',  urlencode($inviteText) );
        $this->set('callbackUrl',  BASE_URL . $this->name . '/init' );
	}

    /**
     * コールバック後処理
     *
     * @author imanishi 
     * @return void
     */
	public function init() {

        if ('hills' == PLATFORM_ENV) {
            $key = 'invite_member'; 
        } elseif ('waku' == PLATFORM_ENV) {
            $key = 'invite_member'; 
        } else {
            $key = 'invite_member'; 
        }

        $inviteMember = !empty($this->params[$key]) ? $this->params[$key] : 0;
        // 不正
        if ( empty($inviteMember) ) {
            $this->log(__FILE__.__LINE__.' userId:'. $this->userId);
            $this->rd('errors', 'index', array('error' => ERROR_ID_BAD_OPERATION )); 
        }

        $tmp = explode(",", $inviteMember);
$this->log($tmp); 
$this->log($this->userId); 
        $mList = array();
        if (is_array($tmp)) {
            $mList = $tmp;
        } else {
            $mList[] = $tmp;
        }
        $pList = $this->FriendInvitePresent->getList($point = 1);    
        $present = array();
        $message = SNS_FRIEND_NAME . self::$inviteSendText;
        foreach ($pList as $data) {
            $present[] = array(
                $this->userId 
            ,   $data['kind'] 
            ,   $data['target'] 
            ,   $data['num'] 
            ,   $message
            );
        }

        $this->FriendInvite->begin(); 
        try {
            $values = array();
            foreach ($mList as $val) {
                $values[] = array(
                    $this->userId  
                ,   $val
                );
                $this->UserPresentBox->registPBox($present);    
            }
            $this->FriendInvite->registFriendInvite($values);    

            foreach ($mList as $val) {

                // フラグ更新
                $value = array('point1_flg' => 1);
                $where = array(
                    'FriendInvite.user_id'            => $this->userId 
                ,   'invite_sns_user_id' => $val 
                ,   'FriendInvite.modified' => NOW_DATE_DB
                );
                $this->FriendInvite->updateAll($value, $where);
            }


        } catch (AppException $e) { 
            $this->FriendInvite->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 

        $this->FriendInvite->commit(); 

        $params = array('invite_membe', $inviteMember);
        $this->rd($this->name, 'end', $params);
    }

    /**
     * 招待完了画面
     */
    public function end () {

    }

    /**
     * 招待通知を受け取る
     */
    public function callback () {

        $this->autoRender = false;   // 自動描画をさせない
$this->log($this->params); 
$this->log($this->request->data); 
        if (empty($this->params['invite_user_id']) || empty($this->params['opensocial_owner_id'])) {
            $this->log(__FILE__.__LINE__.' Param Invalid : ' . $this->userId);
            die;
        }

        // 招待した人のuserId取得
        $where = array('User.sns_user_id' => $this->params['invite_user_id']);
        $userId = $this->User->field('user_id', $where);
       
        $this->FriendInvite->begin(); 
        try {

                // フラグ更新
                $values = array(
                    'callback_flg' => 1
                ,   'FriendInvite.modified' => NOW_DATE_DB 
                );
                $where = array(
                    'FriendInvite.user_id'  => $userId
                ,   'invite_sns_user_id'    => $this->params['opensocial_owner_id'] 
                );
                $this->FriendInvite->updateAll($values, $where);


        } catch (AppException $e) { 
            $this->FriendInvite->rollback(); 
            $this->log($e->errmes);
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
        } 

        $this->FriendInvite->commit(); 
    }


}
