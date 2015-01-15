<?php
App::uses('ApiController', 'Controller');
/**
 * FriendInvites Controller
 *
 */
class FriendInvitesController extends ApiController {

    public $uses = array('SnsUser', 'User', 'FriendInvite', 'FriendInvitePresent', 'UserPresentBox');

    public static $inviteText = 'を一緒にプレイしましょう！';

    public static $inviteSendText = 'へ招待メール送信の報酬';

    public static $inviteGuideText = 'を招待し限定カードをGETしましょう！';
    public static $inviteEndGuideText = 'へ招待メールを送りました！';

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        $point = 1;
        $list = $this->FriendInvitePresent->getList($point);

        $point = 2;
        $listP2 = $this->FriendInvitePresent->getList($point);

        $inviteText = SITE_TITLE . self::$inviteText;
        $inviteGuideText = SNS_FRIEND_NAME . self::$inviteGuideText;

        if ('waku' == PLATFORM_ENV) {
            $action = 'invite:friends';
        } else {
            $action = PLATFORM_URL . PLATFORM_INVITE_PATH . PLATFORM_APP_ID;
        }
        // 本文エンコード
        if ('niji' != PLATFORM_ENV) {
            $inviteText = urlencode($inviteText);
        }

        $this->set('title', SNS_FRIEND_NAME . '招待');
        $this->set('mes', $inviteGuideText );
        $this->set('guideId', 1 );
        $this->set('list', $list);
        $this->set('listP2', $listP2);
        $this->set('subTitle',  SNS_FRIEND_NAME . '招待報酬');
        $this->set('action',  $action );
        $this->set('body',  $inviteText );
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
            $values = array();
            foreach ($mList as $val) {
                // 既に招待がないか確認
                // 招待した人のuserId取得
                $where = array(
                    'invite_sns_user_id' => $val
                ,   'FriendInvite.user_id' => $this->userId
                );
                $ret = $this->FriendInvite->field('user_id', $where);
                if (empty($ret)) {
                    $values[] = array(
                        $this->userId  
                    ,   $val
                    );
                    $this->UserPresentBox->registPBox($present);    
                }
            }
            if (!empty($values)) {
                $this->FriendInvite->registFriendInvite($values);    
            }

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

        $inviteEndGuideText = SNS_FRIEND_NAME . self::$inviteEndGuideText;

        $this->set('mes', $inviteEndGuideText );
        $this->set('guideId', 2 );
        $this->set('title', '招待完了' );
    }

    /**
     * 招待通知を受け取る
     */
    public function callback () {

        $this->autoRender = false;   // 自動描画をさせない

        // 招待された人のIDキー名
        if ('hills' == PLATFORM_ENV) {
            $idName = 'opensocial_owner_id';
        } else {
            $idName = 'id';
        }

        if (empty($this->params[$idName])) {
            $this->log(__FILE__.__LINE__.' App Add No Invite  ' );
            die;
        }

        // 招待した人のuserId取得
        if ('niji' == PLATFORM_ENV) {
            $where = array(
                'User.sns_user_id' => $this->params['invite_from_id']
            );
            $fields = array('user_id');
            $user = $this->User->getAllFind($where, $fields, 'first');

        } else {
            $where = array(
                'invite_sns_user_id' => $this->params[$idName]
            );
            $order = array('FriendInvite.created DESC');
            $fields = array('user_id');
            $user = $this->FriendInvite->getAllFind($where, $fields, 'first', $order);
        }
        if (empty($user['user_id'])) {
            $this->log(__FILE__.__LINE__.' App Add No Invite  ' );
            die;
        }
        $userId = $user['user_id'];

        $this->FriendInvite->begin(); 
        try {
                // フラグ更新
                $values = array(
                    'callback_flg' => 1
                ,   'FriendInvite.modified' => NOW_DATE_DB 
                );
                $where = array(
                    'FriendInvite.user_id'  => $userId
                ,   'invite_sns_user_id'    => $this->params[$idName] 
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
