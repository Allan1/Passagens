<?php

App::uses('AppModel', 'Model');

/**
 * Module Model
 *
 * @property Dir $Dir
 */
class Contact extends AppModel {
    
    var $useTable = false;
    
    var $_schema = array(
        'name' => array('type' => 'string', 'length' => 255),
        'email' => array('type' => 'string', 'length' => 255),
        'message' => array('type' => 'text')
    );
    
 
    public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'email' => array(
			'notempty' => array(
				'rule' => array('email'),
				'message' => 'Este email não parece válido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'message' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                    
                    
		),
        'image' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                    
                    
		),
	);
  
}
?>
