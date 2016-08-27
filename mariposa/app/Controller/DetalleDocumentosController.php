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
class DetalledocumentosController extends AppController {

public function index($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Detalledocumento->Documento->recursive = 0;
		$this->set('documentos', $this->paginate());
	}

	public function admin_index() {
		$Documentos = $this->Detalledocumento->Documento->find('all');
		$this->set('documentos', $Documentos);
		$this->set('detalledocumento', $this->paginate());
	}

public function admin_add($id=null) {
		if ($this->request->is('post')) {
			$this->Detalledocumento->create();
			$pregunta = $this->request->data['Detalledocumento']['pregunta'];
			$docID = $id;
			$target_dir = "docs/ejemplos/".$docID."/";
			$target_dir = str_replace(' ', '_', $target_dir);
			$target_dir = str_replace('?', '', $target_dir);
		    $target_file = $target_dir . basename($this->data['Detalledocumento']["ejemplo"]["name"]);
		    $target_file = str_replace(' ', '_', $target_file);
			$data = array('docID' => $docID, 'pregunta' => $pregunta, 'ejemplo' => $target_file);
			if ($this->Detalledocumento->save($data)) {
			if(file_exists($target_dir)){
      	move_uploaded_file($this->data['Detalledocumento']["ejemplo"]["tmp_name"], $target_file);
      	}else {
         mkdir($target_dir,0777,true);
      	 move_uploaded_file($this->data['Detalledocumento']["ejemplo"]["tmp_name"], $target_file);	
      	}
				$this->Session->setFlash(__('El Documento fue ingresado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo grabar el Documento, por favor intentelo más tarde.'));
			}
		}
	}





public function admin_edit($id = null, $docID = null) {
		$this->Detalledocumento->id = $id;
		$this->set('docID', $docID);
		if (!$this->Detalledocumento->exists()) {
			throw new NotFoundException(__('Invalid Detalledocumento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Detalledocumento->save($this->request->data)) {
				$this->Session->setFlash(__('El Detalledocumento fue editado satisfactoriamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo editar el Detalledocumento, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Detalledocumento->read(null, $id);
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