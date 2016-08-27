<?php
App::uses('AppController', 'Controller');
/**
 * Permisos Controller
 *
 * @property Permiso $Permiso
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class PermisosController extends AppController {

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
		$this->Permiso->recursive = 0;
		$this->set('permisos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		$this->set('permiso', $this->Permiso->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Permiso->create();
			if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('The permiso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permiso could not be saved. Please, try again.'));
			}
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$usuarios = $this->Permiso->Usuarios->find('list',array('fields'=>array('nombre')));
		$this->set(compact('campos', 'usuarios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('The permiso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permiso could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$usuarios = $this->Permiso->Usuarios->find('list',array('fields'=>array('nombre')));
		$this->set(compact('campos', 'usuarios'));
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
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		if ($this->Permiso->delete()) {
			$this->Session->setFlash(__('Permiso deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Permiso was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Permiso->recursive = 0;
		$this->set('permisos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		$this->set('permiso', $this->Permiso->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Permiso->create();
			if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('The permiso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permiso could not be saved. Please, try again.'));
			}
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$usuarios = $this->Permiso->Usuarios->find('list',array('fields'=>array('nombre')));
		$this->set(compact('campos', 'usuarios'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('The permiso has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permiso could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$usuarios = $this->Permiso->Usuarios->find('list',array('fields'=>array('nombre')));
		$this->set(compact('campos', 'usuarios'));
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
		$this->Permiso->id = $id;
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		if ($this->Permiso->delete()) {
			$this->Session->setFlash(__('Permiso deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Permiso was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
