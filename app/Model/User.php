<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class User extends AppModel {

    /**
     * beforeSave method
     * 
     * Validates user 
     * 
     * @param $options
     * @return void
     */
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatório'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatório'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Este login já existe, escolha outro.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatório.'
            )
        ),
    );
    
    public $belongsTo = array(
        	'Role' => array(
                    'className' => 'Role',
                    'foreignKey' => 'role_id',
                )
    );
}
