<?php
App::uses('AppController', 'Controller');
/**
 * Destinos Controller
 *
 * @property Destino $Destino
 */
class DestinosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Destino->recursive = 0;
		$this->set('destinos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Destino->id = $id;
		if (!$this->Destino->exists()) {
			throw new NotFoundException(__('Invalid destino'));
		}
		$this->set('destino', $this->Destino->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Destino->create();
			if ($this->Destino->save($this->request->data)) {
				$this->Session->setFlash(__('The destino has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destino could not be saved. Please, try again.'));
			}
		}
		$seguimientos = $this->Destino->Seguimiento->find('list');
		$this->set(compact('seguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Destino->id = $id;
		if (!$this->Destino->exists()) {
			throw new NotFoundException(__('Invalid destino'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Destino->save($this->request->data)) {
				$this->Session->setFlash(__('The destino has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The destino could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Destino->read(null, $id);
		}
		$seguimientos = $this->Destino->Seguimiento->find('list');
		$this->set(compact('seguimientos'));
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
		$this->Destino->id = $id;
		if (!$this->Destino->exists()) {
			throw new NotFoundException(__('Invalid destino'));
		}
		if ($this->Destino->delete()) {
			$this->Session->setFlash(__('Destino deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Destino was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
