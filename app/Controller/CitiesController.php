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
            $this->layout = 'home';
            $hotels =true;
            $news = true;
            $passages = false;
            $climate = TRUE;
            if($this->request->is('post')){
                if(is_string($this->request->data['City'])){
                    $this->request->data['City'] = unserialize(base64_decode($this->request->data['City']));
                }
                
                if(isset($this->request->data['City'])){
                    $hotels =  $this->request->data['City']['hotels'];
                    $news = $this->request->data['City']['news'];
                    $passages = $this->request->data['City']['passages'];
                    $climate = $this->request->data['City']['climate'];
                    $city = $this->City->findByName($this->request->data['City']['destination']);
                    if($passages)
                        $city_origin = $this->City->findByName($this->request->data['City']['origin']);
                }
                //avaliação de hoteis
                if (isset ($this->request->data['hotelsStarRating']['Manager']['star'])) {
                    $city = $this->City->findByName($this->request->data['City']['destination']);
                    $manager_id = $this->request->data['hotelsStarRating']['Manager']['id'];
                    $star = ($this->request->data['hotelsStarRating']['Manager']['star'][$manager_id]);
                    $this->City->Short->Manager->recursive =-1;
                    $manager = $this->City->Short->Manager->read(null,$manager_id);
                    $manager['Manager']['stars']=$manager['Manager']['stars']+$star;
                    $manager['Manager']['reviews']++;
                    if($this->City->Short->Manager->save($manager))
                        $this->Session->setFlash ('Avaliação feita com sucesso','default',array('class'=>'success'));
                }
                //avaliação de passagens
                if (isset ($this->request->data['passagesStarRating']['Manager']['star'])) {
                    $city = $this->City->findByName($this->request->data['City']['destination']);
                    $manager_id = $this->request->data['passagesStarRating']['Manager']['id'];
                    $star = ($this->request->data['passagesStarRating']['Manager']['star'][$manager_id]);
                    $this->City->Short->Manager->recursive =-1;
                    $manager = $this->City->Short->Manager->read(null,$manager_id);
                    $manager['Manager']['stars']=$manager['Manager']['stars']+$star;
                    $manager['Manager']['reviews']++;
                    if($this->City->Short->Manager->save($manager))
                        $this->Session->setFlash ('Avaliação feita com sucesso','default',array('class'=>'success'));
                }
                
            }
            else
                $city = $this->City->findByName($name);
            
            if (!$city) {
                $this->Session->setFlash('Cidade destino inválida');
                $this->redirect(('/'));
            }
            
            if (($passages)&&!$city_origin) {
                $this->Session->setFlash('Cidade origem inválida');
                $this->redirect(('/'));
            }
            
            $city['City']['access']++;
            $this->City->save($city);
            
            if($passages){
                $city['City']['from']['dia'] = $this->getDayForDate($this->request->data['City']['from']);
                $city['City']['from']['mes'] = $this->getMonthForDate($this->request->data['City']['from']);
                $city['City']['from']['ano'] = $this->getYearForDate($this->request->data['City']['from']);
                $city['City']['to']['dia'] = $this->getDayForDate($this->request->data['City']['to']);
                $city['City']['to']['mes'] = $this->getMonthForDate($this->request->data['City']['to']);
                $city['City']['to']['ano'] = $this->getYearForDate($this->request->data['City']['to']);
            }
            
            $cities = $this->City->find('list', array('order' => 'City.name ASC'));
            $sugestion_name = '';
            
            foreach ($cities as $city2) {
                $sugestion_name .= '{label:"' . $city2 . '"},';
            }
            
            $ranking_cities = $this->City->rankingCities();
            $this->set(compact('ranking_cities'));
            $this->set('city', $city);
            
            if ($hotels)
                $this->set('hotelsList',$this->City->findManagers($city['City']['id'],1));
            if($climate)
                $this->set('climateList',$this->City->findManagers($city['City']['id'],2));
            if ($passages){
                $passagesList = $this->City->findManagers($city['City']['id'],3,$city_origin['City']['id']);
                $this->set(compact('passagesList'));
            }
            if($news)
                $this->set('newsList',$this->City->findManagers($city['City']['id'],4));
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
				$this->Session->setFlash(' city foi salvo com sucesso','default',array('class'=>'success'));
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
				$this->Session->setFlash('Cidade salva com sucesso','default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Cidade não pôde ser salva. Por favor, tente novamente.'));
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
			$this->Session->setFlash('City deletado com sucesso','default',array('class'=>'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('City não foi deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
