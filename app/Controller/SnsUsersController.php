<?php
App::uses('AppController', 'Controller');
    /**
     * SnsUsers Controller
     *
 * @property SnsUser $SnsUser
 * @property PaginatorComponent $Paginator
     */
class SnsUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SnsUser->recursive = 0;
		$this->set('snsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SnsUser->exists($id)) {
			throw new NotFoundException(__('Invalid sns user'));
		}
		$options = array('conditions' => array('SnsUser.' . $this->SnsUser->primaryKey => $id));
		$this->set('snsUser', $this->SnsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SnsUser->create();
			if ($this->SnsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The sns user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sns user could not be saved. Please, try again.'));
			}
		}
		$viewers = $this->SnsUser->Viewer->find('list');
		$this->set(compact('viewers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SnsUser->exists($id)) {
			throw new NotFoundException(__('Invalid sns user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SnsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The sns user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sns user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SnsUser.' . $this->SnsUser->primaryKey => $id));
			$this->request->data = $this->SnsUser->find('first', $options);
		}
		$viewers = $this->SnsUser->Viewer->find('list');
		$this->set(compact('viewers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SnsUser->id = $id;
		if (!$this->SnsUser->exists()) {
			throw new NotFoundException(__('Invalid sns user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SnsUser->delete()) {
			$this->Session->setFlash(__('The sns user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sns user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
