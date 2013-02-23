<?php
App::uses('AppModel', 'Model');

class Role extends AppModel {
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
                                'rule' => 'isUnique',
                                'message' => 'Já existe papel com este nome!'
                        )
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'role_id',
		)
	);
	


	
}
