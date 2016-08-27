<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudade $Ciudade
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class CiudadesController extends AppController {

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
		$this->Ciudade->recursive = 0;
		$this->set('ciudades', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		$this->set('ciudade', $this->Ciudade->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ciudade->create();
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
			}
		}
		$departamentos = $this->Ciudade->Departamentos->find('list',array('fields'=>array('nombre')));
		$this->set(compact('departamentos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciudade->read(null, $id);
		}
		$departamentos = $this->Ciudade->Departamentos->find('list',array('fields'=>array('nombre')));
		$this->set(compact('departamentos'));
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
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->Ciudade->delete()) {
			$this->Session->setFlash(__('Ciudade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciudade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Ciudade->recursive = 0;
		$this->set('ciudades', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		$this->set('ciudade', $this->Ciudade->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ciudade->create();
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
			}
		}
		$departamentos = $this->Ciudade->Departamentos->find('list',array('fields'=>array('nombre')));
		$this->set(compact('departamentos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ciudade->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudade could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ciudade->read(null, $id);
		}
		$departamentos = $this->Ciudade->Departamentos->find('list',array('fields'=>array('nombre')));
		$this->set(compact('departamentos'));
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
		$this->Ciudade->id = $id;
		if (!$this->Ciudade->exists()) {
			throw new NotFoundException(__('Invalid ciudade'));
		}
		if ($this->Ciudade->delete()) {
			$this->Session->setFlash(__('Ciudade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ciudade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
