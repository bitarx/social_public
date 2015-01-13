<?php
App::uses('AppModel', 'Model');
/**
 * UserQueryString Model
 *
 */
class UserQueryString extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'owner_id';

    public function getQueryString($ownerId) {
        $where = array(
            'owner_id' => $ownerId
        );
        return $this->field('query_string', $where);
    }
}
