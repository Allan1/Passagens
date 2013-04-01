<?php
App::uses('AppModel', 'Model');

class Image extends AppModel {
    
    var $useTable = false;
    
    var $_schema = array(
        'photo' => array('type' => 'file', 'length' => 255),
    );
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'photo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);	
}
