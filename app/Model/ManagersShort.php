<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class ManagersShort extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'short_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'manager_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                
	);

}
