<?php
App::uses('AppController', 'Controller');
/**
 * Destinos Controller
 *
 * @property Destino $Destino
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class DocumentosController extends AppController {

public function index($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Documento->recursive = 0;
		$this->set('documentos', $this->paginate());
	}

	public function admin_index() {
		$this->Documento->recursive = 0;
		$this->set('documentos', $this->paginate());
	}

public function admin_add() {
		if ($this->request->is('post')) {
			$this->Documento->create();
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('El Documento fue ingresado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo grabar el Documento, por favor intentelo más tarde.'));
			}
		}
	}





public function admin_edit($id = null) {
		$this->Documento->id = $id;
		if (!$this->Documento->exists()) {
			throw new NotFoundException(__('Invalid Documento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('El Documento fue editado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo editar el Documento, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Documento->read(null, $id);
		}
		$seguimientos = $this->Documento->Seguimiento->find('list',array('fields'=>array('nombre_quinceanera')));
		$this->set(compact('seguimientos'));
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
		$this->Documento->id = $id;
		if (!$this->Documento->exists()) {
			throw new NotFoundException(__('Invalid Documento'));
		}
		if ($this->Documento->delete()) {
			$this->Session->setFlash(__('El Documento fue eliminado con exito'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El Documento no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}	
}