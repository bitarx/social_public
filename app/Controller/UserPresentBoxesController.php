<?php
App::uses('ApiController', 'Controller');
/**
 * UserPresentBoxes Controller
 *
 * @property UserPresentBox $UserPresentBox
 * @property PaginatorComponent $Paginator
 */
class UserPresentBoxesController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array('Paginator');


    /**
     * index method
     *
     * @author imanishi 
     * @return json
     */
	public function index() {

        $hasMaxFlg = isset($this->params['has_max_flg']) ? $this->params['has_max_flg'] : 0;
        $pageAll = 0;
        $list = $this->UserPresentBox->getList($this->userId , $add = 1, $this->offset, $pageAll);
$this->log($hasMaxFlg); 
        $this->set('list', $list);
        $this->set('hasMaxFlg', $hasMaxFlg);
        $this->set('pageAll', $pageAll);
	}

    /**
     * プレゼント一括受取
     *
     * @author imanishi 
     */
    public function initAll() { 

        $list = $this->UserPresentBox->getList($this->userId );

        if (!empty($list)) {
            $this->UserPresentBox->begin(); 
            try {  
                foreach ($list as $val) {
                    $data = $this->UserPresentBox->getDataById($this->userId , $val['user_present_box_id']);
  $this->log($data); 
                    list($id, $hasMaxFlg) = $this->UserPresentBox->getPresent($this->userId, $data, $this->userParam);
                    if (!empty($hasMaxFlg)) break;
                }
            } catch (AppException $e) { 
                $this->UserPresentBox->rollback(); 
                $this->log($e->errmes); 
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
            $this->UserPresentBox->commit(); 
        }
        
        $this->rd('UserPresentBoxes', 'index', array('all_end' => 1, 'has_max_flg' => $hasMaxFlg));  
    } 

    /**
     * プレゼント個別受取
     *
     * @author imanishi 
     */
    public function init() { 

        $userPresentBoxId = $this->params['user_present_box_id'];

        $data = $this->UserPresentBox->getDataById($this->userId , $userPresentBoxId);

        if (!empty($data)) {
            $this->UserPresentBox->begin(); 
            try {  
                list($id, $hasMaxFlg) = $this->UserPresentBox->getPresent($this->userId, $data, $this->userParam);
            } catch (AppException $e) { 
                $this->UserPresentBox->rollback(); 
                $this->log($e->errmes); 
                $this->rd('Errors', 'index', array('error'=> ERROR_ID_SYSTEM )); 
            } 
            $this->UserPresentBox->commit(); 
        }
        
        $this->rd('UserPresentBoxes', 'index', array('init_end' => 1, 'has_max_flg' => $hasMaxFlg ));  
    } 

}
