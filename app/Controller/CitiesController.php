<?php

App::uses('AppController', 'Controller');

class CitiesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Cities';
        
        public function index() {
            $this->set('cities',$this->paginate('City'));
        }
        
        public function view($id = null) {
            $this->City->id = $id;
            if(!$this->City->exists())
                throw new Exception('Cidade inexistente!');
            $this->set('city', $this->City->read());
        }
        
        public function add() {
            
        }
        
        public function edit($id = null) {
            
        }
        
        public function delete($id = NULL) {
            
        }

}
