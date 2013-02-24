<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 */
class RolesController extends AppController {
    var $layout = 'config';
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Role->recursive = 0;
		$this->set('roles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Papel inválido!'));
		}
		$role=$this->Role->read(null, $id); 
		$this->set('role', $role);
	}

/**
 * add method
 *
 * @return void
 */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Role->create();
//			if ($this->Role->save($this->request->data)) {
//				$this->Session->setFlash(__('Papel salvo com sucesso!'), 'default', array('class' => 'success'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('Papel não pôde ser salvo. Por favor, tente novamente.'));
//			}
//		}
//	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Papel inválido!'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('Papel salvo com sucesso!'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Papel não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Role->read(null, $id);
		}
	}
	
		

	/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
//	public function delete($id = null) {
//		if (!$this->request->is('post')) {
//			throw new MethodNotAllowedException();
//		}
//		$this->Role->id = $id;
//		if (!$this->Role->exists()) {
//			throw new NotFoundException(__('Papel inválido'));
//		}
//		if ($id!=1 && $this->Role->delete()) {
//			$this->flashSuccess('Papel deletado');
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->Session->setFlash(__('Papel não foi deletado'));
//		$this->redirect(array('action' => 'index'));
//	}
}
	
