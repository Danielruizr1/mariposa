<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class UsersController extends AppController {
   public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout','index', 'edit');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => FALSE);
    }
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
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ingreso con exito.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo grabar, por favor intente más tarde.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se editó con exito.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser editado, intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('El usuario se eliminó con exito.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
/**
 *Metodos de lgin y logout de la aplicacion
*/
public function admin() {

}

public function userLog() {
  $fecha = $this->request->query['fecha'];
  /*list($month, $day, $year) = split('[/.-]', $fecha);
  $date = $year."-".$day."-".$month;*/
  $cantidad = $this->request->query['cantidad'];
  $sigla = $this->request->query['sigla'];
  $id = $this->request->query['id'];
  $result=$this->User->query("insert into ventas (user_id, destino, cantidad, fecha) values ('$id', '$sigla', '$cantidad', '$fecha')");  	
  	
}

public function adminLog() {
  $periodo = $this->request->query['periodo'];
  $tope = $this->request->query['tope'];
  $sigla = $this->request->query['sigla'];
  $result=$this->User->query("update destinos set $periodo = $tope where sigla= '$sigla'");
  $fecha = date("Y-m-d");
  if($periodo == "topeSemanal"){$result=$this->User->query("update destinos set fechaSemanal = '$fecha' where sigla= '$sigla'");}
  if($periodo == "topeMensual"){$result=$this->User->query("update destinos set fechaMensual = '$fecha' where sigla= '$sigla'");}
  	
  	
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
			$this->User->set( $this->data );
			$conditions = array('User.username'=>$this->data['User']['username']);
			$user = $this->User->find('first',array('conditions'=>$conditions));
			$rol=$user['User']['rol'];
			if($rol=='admin'){
				// change layout
			  $this->layout = '';
			  return $this->redirect(array('controller' => 'users', 'action' => 'admin'));
			}
			$this->layout = '';
			$_SESSION['iduser']=$user['User']['id'];
            return $this->redirect(array('controller' => 'menus', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Usuario o contraseña incorrecta.'), 'default', array(), 'auth');
        }
    }
}
public function logout() {
 
	$this->Session->destroy();
	$this->redirect($this->Auth->logout());
    
}

public function admin_login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
           $this->User->set( $this->data );
			$conditions = array('User.username'=>$this->data['User']['username']);
			$user = $this->User->find('first',array('conditions'=>$conditions));
			$rol=$user['User']['rol'];
			if($rol=='admin'){
				// change layout
			  $this->layout = 'admin';
			  return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
            echo $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Usuario o contraseña incorrecta.'), 'default', array(), 'auth');
        }
    }
}

public function admin_logout() {
    $this->redirect($this->Auth->logout());
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$idusuario=$this->User->getLastInsertId();
				App::import('Model', 'Campo');
	            $campos=new Campo;
	            $permisos=$campos->find('all');
		        $creapermiso=$this->User->crearpermiso($idusuario,$permisos);
				$this->Session->setFlash(__('El usuario se ingreso con exito.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no se pudo grabar, por favor intente más tarde.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se editó con exito.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no pudo ser editado, intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('El usuario se eliminó con exito.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El usuario no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
	public function clear_cache() { 
      $cachePaths = array('js', 'css', 'menus', 'views', 'persistent', 'models'); 
      foreach($cachePaths as $config) { 
        clearCache(null, $config); 
      } 
	  clearCache();
    } 
}
