<?php
App::uses('AppController', 'Controller');
/**
 * Managers Controller
 *
 * @property Manager $Manager
 */
class ManagersController extends AppController {
    var $layout = 'config';
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Manager->recursive = 0;
		$this->set('managers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $this->Manager->recursive = 0;
		$this->Manager->id = $id;
		if (!$this->Manager->exists()) {
			throw new NotFoundException(__('Invalid manager'));
		}
		$this->set('manager', $this->Manager->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manager->create();
			if ($this->Manager->save($this->request->data)) {
				$this->Session->setFlash(' Gerenciador salvo com sucesso','default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(' O gerenciador não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
                $this->set('managers_types',  $this->Manager->ManagersType->find('list'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->Manager->recursive = 0;
		$this->Manager->id = $id;
		if (!$this->Manager->exists()) {
			throw new NotFoundException(__('Invalid manager'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Manager->save($this->request->data)) {
				$this->Session->setFlash(' Gerenciador salvo com sucesso','default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(' O gerenciador não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
                    $this->set('managers_types',  $this->Manager->ManagersType->find('list'));
                    $this->request->data = $this->Manager->read(null, $id);
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Manager->id = $id;
		if (!$this->Manager->exists()) {
			throw new NotFoundException(__('Invalid manager'));
		}
		
		if ($this->Manager->delete()) {
			$this->Session->setFlash('Gerenciador deletado com sucesso','default',array('class'=>'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('O gerenciador não foi excluído, por favor, tente novamente'));
		$this->redirect(array('action' => 'index'));
	}
}
