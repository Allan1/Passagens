<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    var $layout = 'config';
    /**
     * beforeFilter method
     * 
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('add');
    }
    
    /**
     * login method
     * 
     * @return void
     */
    public function login() {
        $this->layout = 'default';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Nome do usuário ou senha inválidos, tente novamente.'));
            }
        }
    }
    
    /**
     * logout method
     * 
     * @return void
     */
    public function logout(){
        $this->redirect($this->Auth->logout());
    }
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__(' Usuário salvo com sucesso'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__(' O usuário não pôde ser salvo. Por favor, tente novamente.'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__(' Usuário salvo com sucesso'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('  O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__(' O usuário não pôde ser excluído. Por favor, tente novamente.'));
        $this->redirect(array('action' => 'index'));
    }

}
