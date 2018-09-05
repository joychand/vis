<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anganwadis Model
 *
 * @method \App\Model\Entity\Anganwadi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anganwadi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anganwadi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anganwadi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anganwadi|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anganwadi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anganwadi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anganwadi findOrCreate($search, callable $callback = null, $options = [])
 */
class AnganwadisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('anganwadis');
        $this->setDisplayField('anganwadi_id');
        $this->setPrimaryKey('anganwadi_id');
        $this->belongsTo('Villages',[
            'className'=>'Villages'
        ])
        ->setForeignKey('village_code');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('anganwadi_id')
            ->allowEmpty('anganwadi_id', 'create');

        $validator
            ->integer('anganwadi_reference_year')
            ->allowEmpty('anganwadi_reference_year');

        $validator
            ->integer('total_anganwadi_centre')
            ->allowEmpty('total_anganwadi_centre');
        $validator
            ->integer('first_qtr_pregnant')
            ->allowEmpty('first_qtr_pregnant');
        $validator
            ->integer('second_qtr_pregnant')
            ->allowEmpty('second_qtr_pregnant'); 
        $validator
            ->integer('third_qtr_pregnant')
            ->allowEmpty('third_qtr_pregnant');            
        $validator
            ->integer('total_anganwadi_worker')
            ->allowEmpty('total_anganwadi_worker');

        $validator
            ->integer('total_enrolled_children')
            ->allowEmpty('total_enrolled_children');
        
        $validator
            ->scalar('anganwadi_worker_name')
            ->maxLength('anganwadi_worker_name', 150)
            ->allowEmpty('anganwadi_worker_name');    
        $validator
            ->scalar('worker_mobile')
            ->maxLength('worker_mobile', 10)
            ->allowEmpty('worker_mobile');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        return $validator;
    }
    public function checkRecord($reference_year=null,$village_code=null){
        $recordexist=$this->exists(['anganwadi_reference_year'=>$reference_year,'village_code'=>$village_code]);
        //debug($recordexist);
        return $recordexist;
    }
}
