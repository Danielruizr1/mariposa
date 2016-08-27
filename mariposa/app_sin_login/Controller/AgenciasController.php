<?php
App::uses('AppController', 'Controller');
/**
 * Agencias Controller
 *
 * @property Agencia $Agencia
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class AgenciasController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Time', 'Javascript');
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
		$this->Agencia->recursive = 0;
		$this->set('agencias', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$this->set('agencia', $this->Agencia->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agencia->create();
			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'));
			}
		}
		$departamentos = $this->Agencia->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Agencia->Ciudades->find('list',array('fields'=>array('nombre')));
		$seguimientos = $this->Agencia->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('departamentos', 'ciudades', 'seguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Agencia->read(null, $id);
		}
		$departamentos = $this->Agencia->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Agencia->Ciudades->find('list',array('fields'=>array('nombre')));
		$seguimientos = $this->Agencia->Seguimiento->find('list',array('fields'=>array('nombrequinceanera')));
		$this->set(compact('departamentos', 'ciudades', 'seguimientos'));
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
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		if ($this->Agencia->delete()) {
			$this->Session->setFlash(__('Agencia deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Agencia was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Agencia->recursive = 0;
		$this->set('agencias', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		$this->set('agencia', $this->Agencia->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Agencia->create();
			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'));
			}
		}
		$departamentos = $this->Agencia->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Agencia->Ciudades->find('list',array('fields'=>array('nombre')));
		$seguimientos = $this->Agencia->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('departamentos', 'ciudades', 'seguimientos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Agencia->save($this->request->data)) {
				$this->Session->setFlash(__('The agencia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencia could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Agencia->read(null, $id);
		}
		$departamentos = $this->Agencia->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Agencia->Ciudades->find('list',array('fields'=>array('nombre')));
		$seguimientos = $this->Agencia->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('departamentos', 'ciudades', 'seguimientos'));
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
		$this->Agencia->id = $id;
		if (!$this->Agencia->exists()) {
			throw new NotFoundException(__('Invalid agencia'));
		}
		if ($this->Agencia->delete()) {
			$this->Session->setFlash(__('Agencia deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Agencia was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
