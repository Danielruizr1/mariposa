<?php
App::uses('AppController', 'Controller');
/**
 * DestinosSeguimientos Controller
 *
 * @property DestinosSeguimiento $DestinosSeguimiento
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class DestinosSeguimientosController extends AppController {

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
		$this->DestinosSeguimiento->recursive = 0;
		$this->set('destinosSeguimientos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		$this->set('destinosSeguimiento', $this->DestinosSeguimiento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DestinosSeguimiento->create();
			if ($this->DestinosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The destinos seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destinos seguimiento could not be saved. Please, try again.'));
			}
		}
		$destinos = $this->DestinosSeguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$seguimientos = $this->DestinosSeguimiento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('destinos', 'seguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DestinosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The destinos seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destinos seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DestinosSeguimiento->read(null, $id);
		}
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
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		if ($this->DestinosSeguimiento->delete()) {
			$this->Session->setFlash(__('Destinos seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Destinos seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DestinosSeguimiento->recursive = 0;
		$this->set('destinosSeguimientos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		$this->set('destinosSeguimiento', $this->DestinosSeguimiento->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DestinosSeguimiento->create();
			if ($this->DestinosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The destinos seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destinos seguimiento could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DestinosSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The destinos seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destinos seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DestinosSeguimiento->read(null, $id);
		}
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
		$this->DestinosSeguimiento->id = $id;
		if (!$this->DestinosSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid destinos seguimiento'));
		}
		if ($this->DestinosSeguimiento->delete()) {
			$this->Session->setFlash(__('Destinos seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Destinos seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
