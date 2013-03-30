<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {
    var $layout = 'config';
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
    if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
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
		
	}
}
