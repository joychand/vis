<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PowerInfras Model
 *
 * @method \App\Model\Entity\PowerInfra get($primaryKey, $options = [])
 * @method \App\Model\Entity\PowerInfra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PowerInfra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PowerInfra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PowerInfra|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PowerInfra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PowerInfra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PowerInfra findOrCreate($search, callable $callback = null, $options = [])
 */
class PowerInfrasTable extends Table
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

        $this->setTable('power_infras');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 10)
            ->allowEmpty('village_code');

        $validator
            ->integer('household_no')
            ->allowEmpty('household_no');

        $validator
            ->integer('electrified_household_no')
            ->allowEmpty('electrified_household_no');

        $validator
            ->integer('reference_year')
            ->allowEmpty('reference_year');

        return $validator;
    }
    public function checkRecord($reference_year=null,$village_code=null){
        $recordexist=$this->exists(['reference_year'=>$reference_year,'village_code'=>$village_code]);
        //debug($recordexist);
        return $recordexist;
    }
}
