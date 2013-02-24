<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class City extends AppModel {

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
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public $hasMany = array(
		'Short' => array(
			'className' => 'Short',
			'foreignKey' => 'city_id',
		)
	);
        
        public function findManagers($id =null, $managers_type = null) {
            $this->recursive = -1;
            $options = array(
                'fields'=>'Manager.*,Short.*',
                'conditions'=>array('City.id ='.$id),
                'joins'=>array(
                    array(
                        'table'=>'shorts',
                        'alias'=>'Short',
                        'conditions'=>'Short.city_id = City.id'
                    ),
                    array(
                        'table'=>'managers_shorts',
                        'alias'=>'ManagersShort',
                        'conditions'=>'ManagersShort.short_id = Short.id'
                    ),
                    array(
                        'table'=>'managers',
                        'alias'=>'Manager',
                        'conditions'=>'ManagersShort.manager_id = Manager.id'
                    ),
                )
            );
            if($managers_type)
                $options['conditions'][]= 'Manager.managers_type_id = '.$managers_type;
            return $this->find('all',$options);
        }
        
        public function rankingCities() {
            $result = $this->query("
                            SELECT id, name, access, @prev := @curr , @curr := access, @rank := IF( @prev = @curr , @rank , @rank +1 ) AS rank 
                            FROM cities AS City, ( 
                                SELECT @curr := NULL , @prev := NULL , @rank :=0
                            )sel1 ORDER BY access DESC
                        ");
            return $result;
        }
}