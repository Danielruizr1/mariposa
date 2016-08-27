<?php
App::uses('AppController', 'Controller');
/**
 * AgenciasSeguimientos Controller
 *
 * @property AgenciasSeguimiento $AgenciasSeguimiento
 */
class AgenciasSeguimientosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AgenciasSeguimiento->recursive = 0;
		$this->set('agenciasSeguimientos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AgenciasSeguimiento->id = $id;
		if (!$this->AgenciasSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid agencias seguimiento'));
		}
		$this->set('agenciasSeguimiento', $this->AgenciasSeguimiento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AgenciasSeguimiento->create();
			if ($this->AgenciasSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The agencias seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencias seguimiento could not be saved. Please, try again.'));
			}
		}
		$agencias = $this->AgenciasSeguimiento->Agencia->find('list');
		$seguimientos = $this->AgenciasSeguimiento->Seguimiento->find('list');
		$this->set(compact('agencias', 'seguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AgenciasSeguimiento->id = $id;
		if (!$this->AgenciasSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid agencias seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AgenciasSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The agencias seguimiento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agencias seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AgenciasSeguimiento->read(null, $id);
		}
		$agencias = $this->AgenciasSeguimiento->Agencia->find('list');
		$seguimientos = $this->AgenciasSeguimiento->Seguimiento->find('list');
		$this->set(compact('agencias', 'seguimientos'));
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
		$this->AgenciasSeguimiento->id = $id;
		if (!$this->AgenciasSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid agencias seguimiento'));
		}
		if ($this->AgenciasSeguimiento->delete()) {
			$this->Session->setFlash(__('Agencias seguimiento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Agencias seguimiento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
