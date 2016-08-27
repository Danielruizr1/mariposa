<?php
App::uses('AppController', 'Controller');
/**
 * Medios Controller
 *
 * @property Medio $Medio
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class MediosController extends AppController {

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
		$this->Medio->recursive = 0;
		$this->set('medios', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		$this->set('medio', $this->Medio->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medio->create();
			if ($this->Medio->save($this->request->data)) {
				$this->Session->setFlash(__('The medio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medio could not be saved. Please, try again.'));
			}
		}
		$seguimientos = $this->Medio->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('seguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Medio->save($this->request->data)) {
				$this->Session->setFlash(__('The medio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medio could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Medio->read(null, $id);
		}
		$seguimientos = $this->Medio->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('seguimientos'));
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
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		if ($this->Medio->delete()) {
			$this->Session->setFlash(__('Medio deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medio was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Medio->recursive = 0;
		$this->set('medios', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		$this->set('medio', $this->Medio->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Medio->create();
			if ($this->Medio->save($this->request->data)) {
				$this->Session->setFlash(__('The medio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medio could not be saved. Please, try again.'));
			}
		}
		$seguimientos = $this->Medio->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('seguimientos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Medio->save($this->request->data)) {
				$this->Session->setFlash(__('The medio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medio could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Medio->read(null, $id);
		}
		$seguimientos = $this->Medio->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('seguimientos'));
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
		$this->Medio->id = $id;
		if (!$this->Medio->exists()) {
			throw new NotFoundException(__('Invalid medio'));
		}
		if ($this->Medio->delete()) {
			$this->Session->setFlash(__('Medio deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medio was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
