<?php
App::uses('ApiController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends ApiController {

    protected static $title = 'プロフィール';

    protected static $guideMes = '閲覧制限がかかっています。';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('UserCard', 'UserParam', 'UserDeckCard', 'SnsUser', 'RaidHelp', 'UserCollect', 'Card', 'RaidPresentLog');

    /**
     * マイページ
     *
     * @author imanishi 
     * @return void
     */
	public function index() {

        // デッキリスト
        $userDeckList = $this->UserDeckCard->getUserDeckData($this->userId);

        // ユーザ名
        $snsUserName  = $this->SnsUser->getUserName($this->ownerId);

        // カード所持枚数
        $this->userParam['card_cnt'] = $this->UserCard->getUserCardCnt($this->userId );

        $act = ($this->userParam['act'] / $this->userParam['act_max']) * 100;


        // レイドボス救援要請
        $helpList = $this->RaidHelp->getHelpList($this->userId, $limit = 1);
        if (!empty($helpList)) {
            foreach ($helpList as &$val) {
                $val['end_time'] = $this->Common->changeTimeStr($val['end_time']);
            }
        }

        // 舞奈を討伐したことがあるか
        $firstPresent = $this->RaidPresentLog->isTarget($this->userId, FIRST_PRESENT_CARD_ID); 

        // アサイン
        $this->set('list', $userDeckList);
        $this->set('data', $this->userParam);
        $this->set('act' , $act);
        $this->set('name', $snsUserName);
        $this->set('haveMoney', $this->userParam['money']);
        $this->set('subTitle', 'レイドボス救援要請');
        $this->set('helpList', $helpList);
        $this->set('firstPresent', $firstPresent);
	}

    /**
     * プロフィール
     *
     * @author imanishi 
     * @return void
     */
	public function prof($id) {

        if (empty($id)) {
            $this->log('User Prof Param Error :'. __FILE__ . __LINE__. 'userId:'.$this->userId);  
            $this->rd('Errors', 'index', array('error'=> ERROR_ID_BAD_OPERATION )); 
        }

        $notDisp = 0;
        if ($this->userId != $id) {
            // 他人
            $this->userId = $id;

            $ownerIdOther = $this->User->getOwnerIdByUserId ($id);

            // ブラックリストチェック
            if ('niji' != PLATFORM_ENV) {

                $ret = $this->snsUtil->isBlocked($this->ownerId, $ownerIdOther);
                if ($ret) {
                    $notDisp = 1;
                } else {
                    $ret = $this->snsUtil->isBlocked($ownerIdOther, $this->ownerId);
                    if ($ret) {
                        $notDisp = 1;
                    }
                }
            }
        }

        // デッキリスト
        $userDeckList = $this->UserDeckCard->getUserDeckData($this->userId);
        // ユーザーステータス取得
        $this->userParam = $this->UserParam->getUserParams($this->userId);

        $where = array('user_id' => $this->userId);
        $this->ownerId = $this->User->field('sns_user_id', $where);

        // ユーザ名
        $snsUserName  = $this->SnsUser->getUserName($this->ownerId);

        // カード所持枚数
        $this->userParam['card_cnt'] = $this->UserCard->getUserCardCnt($this->userId );

        $act = ($this->userParam['act'] / $this->userParam['act_max']) * 100;

        $atk = 0;
        $def = 0;
        $hp  = 0;
        foreach ($userDeckList as $val) {
            if (!empty($val['atk'])) $atk += $val['atk'];
            if (!empty($val['def'])) $def += $val['def'];
            if (!empty($val['hp'])) $hp += $val['hp'];
        }

        // 図鑑
        $haveCnt = $this->UserCollect->getCardCnt($this->userId);
        $allCnt  = $this->Card->getAllCnt();

        // アサイン
        $this->set('list', $userDeckList);
        $this->set('data', $this->userParam);
        $this->set('act' , $act);
        $this->set('name', $snsUserName);
        $this->set('haveMoney', $this->userParam['money']);
        $this->set('atk' , $atk);
        $this->set('def' , $def);
        $this->set('hp'  , $hp);
        $this->set('haveCnt'  , $haveCnt);
        $this->set('allCnt'  , $allCnt);
        $this->set('id'  , $id);
        $this->set('guideId'  , 1 );
        $this->set('mes'  , self::$guideMes );
        $this->set('notDisp'  , $notDisp);
        $this->set('title'  , $snsUserName . 'の' . self::$title);
	}
}
