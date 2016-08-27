<?php
App::uses('AppController', 'Controller');
/**
 * Seguimientos Controller
 *
 * @property Seguimiento $Seguimiento
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class SeguimientosController extends AppController {

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
		$this->Seguimiento->recursive = 0;
		$this->set('seguimientos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		$this->set('seguimiento', $this->Seguimiento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Seguimiento->create();
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seguimiento could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Seguimiento->Usuarios->find('list',array('fields'=>array('nombre')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('usuarios', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Seguimiento->read(null, $id);
		}
		$usuarios = $this->Seguimiento->Usuarios->find('list',array('fields'=>array('nombre')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('usuarios', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
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
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->Seguimiento->delete()) {
			$this->Session->setFlash(__('Seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Seguimiento->recursive = 0;
		$this->set('seguimientos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		$this->set('seguimiento', $this->Seguimiento->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Seguimiento->create();
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seguimiento could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Seguimiento->Usuarios->find('list',array('fields'=>array('nombre')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('usuarios', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Seguimiento->read(null, $id);
		}
		$usuarios = $this->Seguimiento->Usuarios->find('list',array('fields'=>array('nombre')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('usuarios', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
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
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->Seguimiento->delete()) {
			$this->Session->setFlash(__('Seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
