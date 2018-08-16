<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageElectorals Model
 *
 * @method \App\Model\Entity\VillageElectoral get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageElectoral newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageElectoral[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageElectoral|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageElectoral|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageElectoral patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageElectoral[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageElectoral findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageElectoralsTable extends Table
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

        $this->setTable('village_electorals');
        $this->setDisplayField('village_electoral_id');
        $this->setPrimaryKey('village_electoral_id');
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
            ->integer('village_electoral_id')
            ->allowEmpty('village_electoral_id', 'create');

        $validator
            ->integer('reference_year')
            ->allowEmpty('reference_year');

        $validator
            ->integer('electoral_total_household')
            ->allowEmpty('electoral_total_household');

        $validator
            ->integer('electoral_total_voter')
            ->allowEmpty('electoral_total_voter');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        return $validator;
    }
    public function checkRecord($reference_year=null,$village_code=null){
        $recordexist=$this->exists(['reference_year'=>$reference_year,'village_code'=>$village_code]);
        //debug($recordexist);
        return $recordexist;
    }
}
