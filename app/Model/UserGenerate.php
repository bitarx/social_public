<?php
App::uses('AppModel', 'Model');
/**
 * UserGenerate Model
 *
 */
class UserGenerate extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';

    public function getGenerate($userId) {
        $where = array(
            'user_id' => $userId
        );
        return $this->field('generate', $where);
    }
}
