<?php
App::uses('AppController', 'Controller');
/**
 * Campos Controller
 *
 * @property Campo $Campo
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class CamposController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Javascript', 'Time');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Acl', 'Security', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Campo->recursive = 0;
		$this->set('campos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		$this->set('campo', $this->Campo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Campo->create();
			if ($this->Campo->save($this->request->data)) {
				$this->Session->setFlash(__('The campo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campo could not be saved. Please, try again.'));
			}
		}
		$tablas = $this->Campo->Tablas->find('list',array('fields'=>array('nombre')));
		$this->set(compact('tablas'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Campo->save($this->request->data)) {
				$this->Session->setFlash(__('The campo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Campo->read(null, $id);
		}
		$tablas = $this->Campo->Tablas->find('list',array('fields'=>array('nombre')));
		$this->set(compact('tablas'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		if ($this->Campo->delete()) {
			$this->Session->setFlash(__('Campo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Campo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Campo->recursive = 0;
		$this->set('campos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		$this->set('campo', $this->Campo->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Campo->create();
			if ($this->Campo->save($this->request->data)) {
				$this->Session->setFlash(__('The campo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campo could not be saved. Please, try again.'));
			}
		}
		$tablas = $this->Campo->Tablas->find('list',array('fields'=>array('nombre')));
		$this->set(compact('tablas'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Campo->save($this->request->data)) {
				$this->Session->setFlash(__('The campo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Campo->read(null, $id);
		}
		$tablas = $this->Campo->Tablas->find('list',array('fields'=>array('nombre')));
		$this->set(compact('tablas'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Campo->id = $id;
		if (!$this->Campo->exists()) {
			throw new NotFoundException(__('Invalid campo'));
		}
		if ($this->Campo->delete()) {
			$this->Session->setFlash(__('Campo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Campo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
