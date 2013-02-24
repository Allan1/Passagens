<?php
App::uses('AppController', 'Controller');
/**
 * Citys Controller
 *
 * @property City $City
 */
class CitiesController extends AppController {
    var $layout = 'config';
    /**
     * beforeFilter method
     * 
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
            if($this->request->is('post')){
                $this->City->id = $this->request->data['City']['city_id'];
                $this->redirect(array('action'=>'view',$this->City->field('name'), null));
            }

            $this->City->recursive = 0;
            $this->set('cities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($name = null, $data = null) {
            $city = $this->City->findByName($name);
            if (!$city) {
                    throw new NotFoundException(__('Cidade inválida'));
            }
            $this->set('city', $city);
            $this->set('hotels',$this->City->findManagers($city['City']['id'],1));
            $this->set('climate',$this->City->findManagers($city['City']['id'],2));
            $this->set('passages',$this->City->findManagers($city['City']['id'],3));
            $this->set('news',$this->City->findManagers($city['City']['id'],4));
            $this->set('cities',  $this->City->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__(' city foi salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(' city não pôde ser salvo. Por favor, tente novamente.'));
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__(' city foi salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(' city não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->City->read(null, $id);
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
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		
		if ($this->City->delete()) {
			$this->Session->setFlash(__('City deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City não foi deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
