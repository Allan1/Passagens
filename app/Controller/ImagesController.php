<?php
    App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ImagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Images';
    var $layout = 'config';
    public $uses = array('');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {

            if ($this->data) {
                if ($this->data['check']['check']) {
                    $file = new File(WWW_ROOT . DS . 'img' . DS . 'uploads/bg.jpg', true, 0644);
                    $target = WWW_ROOT . DS . 'img' . DS . 'bg.jpg';
                    if ($file->copy($target, true))
                        echo $this->Session->setFlash("Plano de fundo removido com sucesso (Caso não tenha mudado, limpe o cache do navegador, teclas de atalho usuais: CTRL+SHIFT+R)", 'default', array('class' => 'success'));
                    else
                        echo $this->Session->setFlash("Plano de fundo não removido", 'default');
                }
            }else {
                if (isset($_FILES['uploaded'])) {
                    $_FILES['uploaded']['name'] = "bg.jpg";
                    $target = WWW_ROOT . DS . 'img' . DS . basename($_FILES['uploaded']['name']);
                    if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
                        echo $this->Session->setFlash("Plano de fundo trocado com sucesso (Caso não tenha mudado, limpe o cache do navegador, teclas de atalho usuais: CTRL+SHIFT+R)", 'default', array('class' => 'success'));
                        //$chmod o+rw galleries      
                    } else {
                        echo $this->Session->setFlash("Plano de fundo não alterado", 'default');
                    }
                }
            }
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
  
    }

}
