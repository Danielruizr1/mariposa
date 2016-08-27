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
class DestinocumentosController extends AppController {

	public function admin_index() {
		$this->Destinocumento->recursive = 0;
		$Destinos = $this->Destinocumento->Destino->find('all');
		$this->set('destinos', $Destinos);
		$Documentos = $this->Destinocumento->Documento->find('all');
		$this->set('documentos', $Documentos);
		$this->set('destinocumentos', $this->paginate());

	}

public function admin_add() {
		if ($this->request->is('post')) {
			$this->Destinocumento->create();
			if ($this->Destinocumento->save($this->request->data)) {
				$id = $this->request->data['destID'];
				$this->Session->setFlash(__('El Documento fue ingresado satisfactoriamente'));
				$this->redirect(array('action' => 'index',$id));
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
		$this->Destinocumento->id = $id;
		if (!$this->Destinocumento->exists()) {
			throw new NotFoundException(__('Invalid Destinocumento'));
		}
		if ($this->Destinocumento->delete()) {
			$this->Session->setFlash(__('El Destinocumento fue eliminado con exito'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El Destinocumento no pudo ser eliminado.'));
		$this->redirect(array('action' => 'index'));
	}	
}