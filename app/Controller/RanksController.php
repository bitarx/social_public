<?php
App::uses('ApiController', 'Controller');
/**
 * Ranks Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class RanksController extends ApiController {

    public static $title = '逆ブートキャンプで教姦です！ランキングTOP10';

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');

    public $uses = array('EvRaidRankFirst', 'EvRaidRankSecond', 'User', 'UserCard');

    /**
     * index method
     *
     * @author imanishi 
     */
	public function index() {

        // 1:前半 2:後半
        $kind = empty($this->params['kind']) ? 1 : $this->params['kind'];

        $limit = 10;

        if (1 == $kind) {
            // 前半
            $md = $this->EvRaidRankFirst;
            $termName = '前半戦';
        } else {
            // 後半
            $md = $this->EvRaidRankSecond;
            $termName = '後半戦';
        }

        $list = $md->getList($limit);

        $curRank = $md->getCurRank($this->userId);

        $maxRank = $md->getMaxRank();

        $topPercent = 0;
        if (!empty($curRank)) {
            $topPercent = floor(100 * ($curRank / $maxRank));
        }


        // ユーザ名
        $snsUserName  = $this->SnsUser->getUserName($this->ownerId);

        $this->set('list', $list);
        $this->set('kind', $kind);
        $this->set('topPercent', $topPercent);
        $this->set('guideId', 2);
        $this->set('mes', 'ランキングがまだありません。');
        $this->set('title', self::$title);
        $this->set('snsName', $snsUserName);
        $this->set('termName', $termName);
	}

}
