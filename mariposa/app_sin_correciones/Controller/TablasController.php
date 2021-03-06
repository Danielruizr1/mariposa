<?php
App::uses('AppController', 'Controller');
/**
 * Tablas Controller
 *
 * @property Tabla $Tabla
 */
class TablasController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tabla->recursive = 0;
		$this->set('tablas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tabla->id = $id;
		if (!$this->Tabla->exists()) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		$this->set('tabla', $this->Tabla->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tabla->create();
			if ($this->Tabla->save($this->request->data)) {
				$this->Session->setFlash(__('The tabla has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tabla could not be saved. Please, try again.'));
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
		$this->Tabla->id = $id;
		if (!$this->Tabla->exists()) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tabla->save($this->request->data)) {
				$this->Session->setFlash(__('The tabla has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tabla could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tabla->read(null, $id);
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
		$this->Tabla->id = $id;
		if (!$this->Tabla->exists()) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		if ($this->Tabla->delete()) {
			$this->Session->setFlash(__('Tabla deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tabla was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
