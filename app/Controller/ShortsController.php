<?php
App::uses('AppController', 'Controller');
/**
 * Shorts Controller
 *
 * @property Short $Short
 */
class ShortsController extends AppController {
    var $layout = 'config';
	
/**
 * index method
 *
 * @return void
 */
	public function index($city_id = null) {
            $this->Short->City->id = $city_id;
            if (!$this->Short->City->exists())
                throw new Exception("Cidade inexistente");
            $this->paginate = array(
                'fields'=>'Short.*',
                'conditions'=>'Short.city_id = '.$city_id
            );
            $this->set('shorts', $this->paginate());
            $this->set(compact('city_id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Short->id = $id;
		if (!$this->Short->exists()) {
			throw new NotFoundException(__('Abreviação inválido!'));
		}
		$short=$this->Short->read(null, $id); 
		$this->set('short', $short);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($city_id = null) {
            $this->Short->City->id = $city_id;
            if (!$this->Short->City->exists())
                throw new Exception("Cidade inexistente");
            if ($this->request->is('post')) {
                $this->Short->create();
                $this->request->data['Short']['city_id'] = $city_id;
                if ($this->Short->save($this->request->data)) {
                        $this->Session->setFlash(__('Abreviação salva com sucesso!'), 'default', array('class' => 'success'));
                        $this->redirect(array('action' => 'index',$city_id));
                } else {
                        $this->Session->setFlash(__('Abreviação não pôde ser salva. Por favor, tente novamente.'));
                }
            }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Short->id = $id;
		if (!$this->Short->exists()) {
			throw new NotFoundException(__('Abreviação inválido!'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Short->save($this->request->data)) {
				$this->Session->setFlash(__('Abreviação salva com sucesso!'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index',  $this->request->data['Short']['city_id']));
			} else {
				$this->Session->setFlash(__('Abreviação não pôde ser salva. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Short->read(null, $id);
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
		$this->Short->id = $id;
		if (!$this->Short->exists()) {
			throw new NotFoundException(__('Abreviação inválido'));
		}
		if ($this->Short->delete()) {
			$this->flashSuccess('Abreviação deletado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Abreviação não foi deletado'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function managers($id = null){
            $this->Short->id = $id;
            $this->Short->recursive = 2;
            if (!$this->Short->exists()) {
                throw new NotFoundException(__('Abreviação inválido!'));
            }
            $this->set('managers_unrelated',$this->Short->Manager->findManagersUnrelatedToShort($id));
            $this->paginate = array('conditions'=>'Short.id='.$id);
            $managers = $this->paginate();
            $this->set('managers',$managers[0]);
            
            if($this->request->is('post')){
                $this->request->data['ManagersShort']['short_id'] = $id;
                if($this->Short->ManagersShort->save($this->request->data)){
                    $this->Session->setFlash('Relação salva com sucesso');
                    $this->redirect(array('action'=>'managers',$id));
                }
                else
                    $this->Session->setFlash('A relação não pôde ser salva.');
            }
        }
}
	
