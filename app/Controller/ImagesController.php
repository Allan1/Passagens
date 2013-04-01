<?php

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
    public $uses = array('Image');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
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
        $file = $this->data['Upload']['file'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            $id = String::uuid();
            if (move_uploaded_file($file['tmp_name'], APP . 'uploads' . DS . $id)) {
                $this->data['Upload']['id'] = $id;
                $this->data['Upload']['user_id'] = $this->Auth->user('id');
                $this->data['Upload']['filename'] = $file['name'];
                $this->data['Upload']['filesize'] = $file['size'];
                $this->data['Upload']['filemime'] = $file['type'];
                return true;
            }
        }
        return false;
    }

}
