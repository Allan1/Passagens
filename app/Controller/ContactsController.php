<?php

App::uses('AppController', 'Controller');

/**
 * Managers Controller
 *
 * @property Manager $Manager
 */
class ContactsController extends AppController {

    public $name = 'Contact';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    function index() {
        if ($this->request->is('post')) {
            $this->Contact->set($this->data);
            if ($this->Contact->validates()) {
                $to = 'novaes.ssa@gmail.com';
                $subject = '[CYHELPME]Contact message from ' . $this->data['Contact']['name'];
                $from = $this->data['Contact']['email'];
                $message = $this->data['Contact']['message'];
                if(mail($to, $subject, $message))
                    $this->Session->setFlash ('Mensagem enviada com sucesso','default',array('class'=>'success'));
                else
                    $this->Session->setFlash ('Mensagem não enviada, por favor, tente novamente.');
//                $this->Email->to = 'novaes.ssa@gmail.com';
//                $this->Email->subject = '[CYHELPME]Contact message from ' . $this->data['Contact']['name'];
//                $this->Email->from = $this->data['Contact']['email'];
//                $this->Email->mail($this->data['Contact']['message']);
            }
        }
    }

}

?>
