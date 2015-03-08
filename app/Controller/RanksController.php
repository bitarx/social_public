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
            $list = $this->EvRaidRankFirst->getList($limit);

        } else {
            // 後半
            $list = $this->EvRaidRankSecond->getList($limit);
        }

        $this->set('list', $list);
        $this->set('kind', $kind);
        $this->set('guideId', 2);
        $this->set('mes', 'ランキングがまだありません。');
        $this->set('title', self::$title);
	}

}
