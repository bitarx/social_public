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
            foreach ($mList as $val) {
                $values = array(
                    'user_id'  => $this->userId  
                ,   'invite_sns_user_id ' => $val
                );
                $this->FriendInvite->save($values);    

            }

            $this->UserPresentBox->registPBox($present);    
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


}
