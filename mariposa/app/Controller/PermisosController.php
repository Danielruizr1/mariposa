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
*Baja seguridad para que deje pasar al grabado
*/
public function beforeFilter() {
    if (isset($this->Security) && $this->action == 'admin_edit') {
        $this->Security->validatePost = false;
    }
}

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
				$this->Session->setFlash(__('El permiso no pudo ser ingresado, por favor intentelo más tarde.'));
			}
		}
		$tablas = $this->Permiso->Tablas->find('list',array('fields'=>array('nombre')));
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('tablas', 'campos', 'users'));
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
				$this->Session->setFlash(__('El permiso no pudo ser editado, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$tablas = $this->Permiso->Tablas->find('list',array('fields'=>array('nombre')));
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('tablas', 'campos', 'users'));
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
		$this->Permiso->recursive = 0;
		$permisos=$this->Permiso->find('all');
		$this->set('permisos', $permisos);
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set('usuario',$users);
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
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set('usuario',$users);
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
				$this->Session->setFlash(__('El permiso ingreso satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser ingresado, por favor intentelo más tarde.'));
			}
		}
		$tablas = $this->Permiso->Tablas->find('list',array('fields'=>array('nombre')));
		//$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('fields'=>array('username')));
		$this->set(compact('tablas', 'campos', 'users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Permiso->id = $id;
		$tabla=$_GET['tablas'];
		$user=$_GET['user'];
		if (!$this->Permiso->exists()) {
			throw new NotFoundException(__('Invalid permiso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//print_r($_POST);
			$campos=$_POST['idcampo'];
			$user=$this->data['Permiso']['users_id'];
			foreach($campos as $campo){
				$permisos=$this->Permiso->find('first',array('conditions'=>array('Permiso.users_id'=>$user, 'Permiso.campos_id'=>$campo)));
				$nombrecampo=$permisos['Campos']['nombre'];
				$idpermiso=$permisos['Permiso']['id'];
				$campo1=$permisos['Campos']['id'];
					$nombrecrear='crear'.$campo;
					$nombreactualizar='actualizar'.$campo;
					$nombreeliminar='eliminar'.$campo;
					$nombreseleccionar='seleccionar'.$campo;
					$crear=$_POST[$nombrecrear];
					$actualizar=$_POST[$nombreactualizar];
					$eliminar=$_POST[$nombreeliminar];
					$seleccionar=$_POST[$nombreseleccionar];
					if(!empty($crear)){
						$this->request->data['Permiso']['crear']=$crear[0];
					}else{
						$this->request->data['Permiso']['crear']=2;
					}
					if(!empty($actualizar)){
						$this->request->data['Permiso']['actualizar']=$actualizar[0];
					}else{
						$this->request->data['Permiso']['actualizar']=2;
					}
					if(!empty($eliminar)){
						$this->request->data['Permiso']['eliminar']=$eliminar[0];
					}else{
						$this->request->data['Permiso']['eliminar']=2;
					}
					if(!empty($seleccionar)){
						$this->request->data['Permiso']['seleccionar']=$seleccionar[0];
					}else{
						$this->request->data['Permiso']['seleccionar']=2;
					}
					$this->request->data['Permiso']['id']=array('0'=>$idpermiso);
			        $this->request->data['Permiso']['campos_id']=$campo;
				$this->Permiso->guardarquery($this->request->data);
				
			}
			$this->Session->setFlash(__('El permiso fue editado satisfactoramente.'));
		    $this->redirect(array('action' => 'index'));
			/*if ($this->Permiso->save($this->request->data)) {
				$this->Session->setFlash(__('El permiso fue editado satisfactoramente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El permiso no pudo ser editado, por favor intentelo más tarde.'));
			}*/
		} else {
			$this->request->data = $this->Permiso->read(null, $id);
		}
		$tablas = $this->Permiso->Tablas->find('list',array('conditions' => array('id' => $tabla),'fields'=>array('nombre')));
		$campos = $this->Permiso->Campos->find('list',array('fields'=>array('nombre')));
		$users = $this->Permiso->Users->find('list',array('conditions' => array('id' => $user),'fields'=>array('email')));
		$permisos=$this->Permiso->find('all',array('conditions'=>array('Permiso.users_id'=>$user, 'Permiso.tablas_id'=>$tabla)));
		$this->set(compact('tablas', 'campos', 'users','permisos'));
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
}
