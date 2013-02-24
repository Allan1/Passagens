<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class ManagersType extends AppModel {

        public $hasMany = array(
		'Manager' => array(
			'className' => 'Manager',
			'foreignKey' => 'managers_type_id',
		)
	);
	

}
