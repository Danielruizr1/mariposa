<?php
App::uses('AppController', 'Controller');
/**
 * Trackers Controller
 *
 * @property Tracker $Tracker
 */
class TrackersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tracker->recursive = 0;
		$this->set('trackers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tracker->id = $id;
		if (!$this->Tracker->exists()) {
			throw new NotFoundException(__('Invalid tracker'));
		}
		$this->set('tracker', $this->Tracker->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tracker->create();
			if ($this->Tracker->save($this->request->data)) {
				$this->Session->setFlash(__('The tracker has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tracker could not be saved. Please, try again.'));
			}
		}
		$destinosSeguimientos = $this->Tracker->DestinosSeguimientos->find('list');
		$this->set(compact('destinosSeguimientos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Tracker->id = $id;
		if (!$this->Tracker->exists()) {
			throw new NotFoundException(__('Invalid tracker'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tracker->save($this->request->data)) {
				$this->Session->setFlash(__('The tracker has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tracker could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tracker->read(null, $id);
		}
		$destinosSeguimientos = $this->Tracker->DestinosSeguimientos->find('list');
		$this->set(compact('destinosSeguimientos'));
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
		$this->Tracker->id = $id;
		if (!$this->Tracker->exists()) {
			throw new NotFoundException(__('Invalid tracker'));
		}
		if ($this->Tracker->delete()) {
			$this->Session->setFlash(__('Tracker deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tracker was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
