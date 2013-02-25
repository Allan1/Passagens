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
        
        public function findManagers($id =null, $managers_type = null, $city_origin_id = null) {
            $this->recursive = -1;
            $options = array(
                'fields'=>'Manager.*,Short.*',
                'conditions'=>array('City.id = '.$id),
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
            if($city_origin_id){
                $options['fields']='Manager.*,Short.*,Short2.*';
                $options['conditions']= array('(City.id ='.$city_origin_id.' AND City2.id = '.$id.')');
                $options['conditions'][]= ('(Short.id <> Short2.id)');
                $options['group']=array('Manager.id');
                $options['joins']=array(
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
                    array(
                        'table'=>'managers',
                        'alias'=>'Manager2',
                        'conditions'=>'Manager.id = Manager2.id'
                    ),
                    array(
                        'table'=>'managers_shorts',
                        'alias'=>'ManagersShort2',
                        'conditions'=>'ManagersShort2.manager_id = Manager2.id'
                    ),
                    array(
                        'table'=>'shorts',
                        'alias'=>'Short2',
                        'conditions'=>'Short2.id = ManagersShort2.short_id'
                    ),
                    array(
                        'table'=>'cities',
                        'alias'=>'City2',
                        'conditions'=>'City2.id = Short2.city_id'
                    )
                );
            }
            if($managers_type)
                $options['conditions'][]= 'Manager.managers_type_id = '.$managers_type;
            $result = $this->find('all',$options);
            
            $options['conditions'] = array('City.id ='.$city_origin_id);
            if($managers_type)
                $options['conditions'][]= 'Manager.managers_type_id = '.$managers_type;
            
            return $result;
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