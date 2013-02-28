<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 * @property Dir $Dir
 */
class Manager extends AppModel {

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
                'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo não pode estar vazio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'link' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
        'ManagersType' => array(
            'className' => 'ManagersType',
            'foreignKey' => 'managers_type_id',
        )
    );
    
    public $hasAndBelongsToMany = array(
        'Short' =>
            array(
                'className'              => 'Short',
                'joinTable'              => 'managers_shorts',
                'foreignKey'             => 'manager_id',
                'associationForeignKey'  => 'short_id',
            )
    );
    
    public function findManagersUnrelatedToShort($short_id) {
        $this->recursive=-1;
        $all = $this->find('list', array(
            'conditions'=>array(('ManagersShort.short_id ='.$short_id)),
            'joins'=>array(
                array(
                    'table'=>'managers_shorts',
                    'alias'=>'ManagersShort',
                    'type'=>'inner',
                    'conditions'=>'ManagersShort.manager_id = Manager.id'
                ),
            )
        ));
        $options['conditions']=array();
        foreach ($all as $key => $value) {
            $options['conditions'][]=('Manager.id <> '.$key);
        }
        $result = $this->find('list',$options);
        $this->recursive = 0;
        foreach ($result as $key => $value) {
            $this->id = $key;
            $result[$key].=' ('.$this->field('ManagersType.name').')';
        }
        return $result;
    }
}
