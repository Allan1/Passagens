<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class Short extends AppModel {

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
        	'City' => array(
                    'className' => 'City',
                    'foreignKey' => 'city_id',
                )
    );
    
    public $hasAndBelongsToMany = array(
        'Manager' =>
            array(
                'className'              => 'Manager',
                'joinTable'              => 'managers_shorts',
                'foreignKey'             => 'short_id',
                'associationForeignKey'  => 'manager_id',
            )
    );

}
