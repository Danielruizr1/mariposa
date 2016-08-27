<?php
App::uses('AppController', 'Controller');
/**
 * MediosSeguimientos Controller
 *
 * @property MediosSeguimiento $MediosSeguimiento
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class MediosSeguimientosController extends AppController {

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
		$this->MediosSeguimiento->recursive = 0;
		$this->set('mediosSeguimientos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		$this->set('mediosSeguimiento', $this->MediosSeguimiento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MediosSeguimiento->create();
			if ($this->MediosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The medios seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medios seguimiento could not be saved. Please, try again.'));
			}
		}
		$seguimientos = $this->MediosSeguimiento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$medios = $this->MediosSeguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('seguimientos', 'medios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The medios seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medios seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediosSeguimiento->read(null, $id);
		}
		$seguimientos = $this->MediosSeguimiento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$medios = $this->MediosSeguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('seguimientos', 'medios'));
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
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		if ($this->MediosSeguimiento->delete()) {
			$this->Session->setFlash(__('Medios seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medios seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediosSeguimiento->recursive = 0;
		$this->set('mediosSeguimientos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		$this->set('mediosSeguimiento', $this->MediosSeguimiento->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediosSeguimiento->create();
			if ($this->MediosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The medios seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medios seguimiento could not be saved. Please, try again.'));
			}
		}
		$seguimientos = $this->MediosSeguimiento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$medios = $this->MediosSeguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('seguimientos', 'medios'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The medios seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medios seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediosSeguimiento->read(null, $id);
		}
		$seguimientos = $this->MediosSeguimiento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$medios = $this->MediosSeguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('seguimientos', 'medios'));
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
		$this->MediosSeguimiento->id = $id;
		if (!$this->MediosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid medios seguimiento'));
		}
		if ($this->MediosSeguimiento->delete()) {
			$this->Session->setFlash(__('Medios seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Medios seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
