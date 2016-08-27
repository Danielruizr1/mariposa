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
class PagosdestinoController extends AppController {

public function index($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Pagosdestino->Destino->recursive = 0;
		$this->set('pagosDestino', $this->paginate());
	}

	public function admin_index() {
		$Destinos = $this->Pagosdestino->Destino->find('all');
		$this->set('destinos', $Destinos);
		$this->set('pagosDestino', $this->paginate());
	}

public function admin_add($id=null) {
		if ($this->request->is('post')) {
			$this->Pagosdestino->create();
			$destID = $id;
			$pago = $this->request->data['Pagosdestino']['pago'];
			$valor = $this->request->data['Pagosdestino']['valor'];
			$moneda = $this->request->data['Pagosdestino']['moneda'];
			$data = array('destino_id' => $destID, 'pago' => $pago, 'valor' => $valor, 'moneda' => $moneda);
			if ($this->Pagosdestino->save($data)) {
				$this->Session->setFlash(__('El Documento fue ingresado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo grabar el Documento, por favor intentelo más tarde.'));
			}
	    }
}





public function admin_edit($id = null, $docID = null) {
		$this->Pagosdestino->id = $id;
		if (!$this->Pagosdestino->exists()) {
			throw new NotFoundException(__('Invalid Destino'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pagosdestino->save($this->request->data)) {
				$this->Session->setFlash(__('El Pagosdestino fue editado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo editar el Pagosdestino, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Pagosdestino->read(null, $id);
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