<?php
App::uses('AppController', 'Controller');
/**
 * Departamentos Controller
 *
 * @property Departamento $Departamento
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class DepartamentosController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Ajax', 'Javascript', 'Time');
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
	public function index($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Departamento->recursive = 0;
		$this->set('departamentos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		$this->set('departamento', $this->Departamento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Departamento->create();
			if ($this->Departamento->save($this->request->data)) {
				$this->Session->setFlash(__('El departamento se ingreso correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El apartamento no se pudo grabar, por favor intentelo más tarde.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Departamento->save($this->request->data)) {
				$this->Session->setFlash(__('El departamento se ha editado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El departamento no se ha podido editar, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Departamento->read(null, $id);
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
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		if ($this->Departamento->delete()) {
			$this->Session->setFlash(__('El departamento fue eliminado con exito.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El departamento no se ha podido elminiar.'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Departamento->recursive = 0;
		$this->set('departamentos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		$this->set('departamento', $this->Departamento->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Departamento->create();
			if ($this->Departamento->save($this->request->data)) {
				$this->Session->setFlash(__('El departamento se ingreso correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El apartamento no se pudo grabar, por favor intentelo más tarde.'));
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
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Departamento->save($this->request->data)) {
				$this->Session->setFlash(__('El departamento se ha editado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El departamento no se ha podido editar, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Departamento->read(null, $id);
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
		$this->Departamento->id = $id;
		if (!$this->Departamento->exists()) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		if ($this->Departamento->delete()) {
			$this->Session->setFlash(__('El departamento fue eliminado con exito.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El departamento no se ha podido elminiar.'));
		$this->redirect(array('action' => 'index'));
	}
}
