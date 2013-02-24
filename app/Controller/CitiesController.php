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
        $this->Auth->allow('view');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
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
            if($this->request->is('post')){
                $city = $this->City->findByName($this->request->data['City']['name']);
            }
            else
                $city = $this->City->findByName($name);
            
            if (!$city) {
                    throw new NotFoundException(__('Cidade inválida'));
            }
            $city['City']['access']++;
            $this->City->save($city);
            $cities = $this->City->find('list', array('order' => 'City.name ASC'));
            $sugestion_name = '';
            foreach ($cities as $city2) {
                $sugestion_name .= '{label:"' . $city2 . '"},';
            }
            $ranking_cities = $this->City->rankingCities();
            $this->set(compact('ranking_cities'));
            $this->set('city', $city);
            $this->set('hotels',$this->City->findManagers($city['City']['id'],1));
            $this->set('climate',$this->City->findManagers($city['City']['id'],2));
            $this->set('passages',$this->City->findManagers($city['City']['id'],3));
            $this->set('news',$this->City->findManagers($city['City']['id'],4));
            $this->set('sugestion_name',  $sugestion_name);
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
