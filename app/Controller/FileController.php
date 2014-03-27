<?php
App::uses('ApiController', 'Controller');
/**
 * File Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class FileController extends ApiController {

    /**
     * Components
     *
     * @var array
     */
	public $components = array();

    public $uses = array('UserCard');

    /**
     * 画像取得
     *
     * @author imanishi 
     * @return 問題がなければ対象ファイルを返す。問題があればfalseを返す  
     */
	public function outimage() {

        // ユーザではない
        if (!$this->userId) {
            $this->log('File not userId'); 
            return false;
        }

        $this->autoRender = false;

        $size = $this->params['size'];
        $dir = $this->params['dir'];
        $targetId = $this->params['target'];

        switch ($dir) {
            case 'card':
                // 所有チェック
                $ret = $this->UserCard->getUserCard ($this->userId , $targetId );
                $filename = 'card_' . $size . '_' . $targetId . '.jpg'; 
                break;
            default:
                return false;
        }

        // 所有状態ではない
        if (empty($ret)) { 
            $this->log('File not Hold userId:' . $this->userId ); 
            return false;
        } 

        if ($filename) {
            $info = pathinfo($filename);
            $file = $info['basename'];
            $ext = $info['extension'];

            if ($ext == 'jpg' || $ext == 'gif' || $ext == 'png') {

                $name = $ext;
                if ($name == 'jpg') {
                    $name = 'jpeg';
                }

                $path = IMG_DIR . $dir . '/' . $filename;

                if (file_exists($path)) {
                    header("Content-Disposition: inline; filename=test");
                    header('Content-type: image/' . $name);
                    echo readfile($path);
                    exit;
                } else {
                    // 対象ファイルは存在しない
                    $this->log('File not Exists path:'. $path . ': userId :' . $this->userId ); 
                    return false;
                }
            }
        }
	}
}
