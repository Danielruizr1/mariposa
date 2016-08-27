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
				$this->Session->setFlash(__('El permiso ingreso satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser ingresado, por faor intentelo más tarde.'));
			}
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('campos', 'users'));
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
				$this->Session->setFlash(__('El permiso fue editado satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser editado, por faor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('campos', 'users'));
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
			$this->Session->setFlash(__('El permiso fue eliminado satisfactoriamente'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El permiso no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Permiso->recursive = 2;
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
			print_r($_POST);
			$this->Permiso->create();
			if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('El permiso ingreso satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser ingresado, por faor intentelo más tarde.'));
			}
		}
		App::import('Model', 'Tabla'); 
		$tabla = new Tabla();
		$tablas=$tabla->find('list',array('fields'=>array('nombre'),'recursive' => 2));
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre'),'recursive' => 2));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('users', 'tablas', 'campos'));
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
				$this->Session->setFlash(__('El permiso fue editado satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser editado, por faor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('campos', 'users'));
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
			$this->Session->setFlash(__('El permiso fue eliminado satisfactoriamente'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El permiso no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
/**
*
*Llama los campos en la tabla
*/
   public function admin_llamaajax($id=null){
	   $campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre'),'conditions'=>array('tablas_id' => $id)));
	   $this->set(compact('campos', 'users'));
   }
}


