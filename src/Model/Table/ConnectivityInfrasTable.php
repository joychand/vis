<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConnectivityInfras Model
 *
 * @method \App\Model\Entity\ConnectivityInfra get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConnectivityInfra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ConnectivityInfra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConnectivityInfra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConnectivityInfra|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConnectivityInfra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConnectivityInfra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConnectivityInfra findOrCreate($search, callable $callback = null, $options = [])
 */
class ConnectivityInfrasTable extends Table
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

        $this->setTable('connectivity_infras');
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
            ->scalar('approached_road_status')
            ->allowEmpty('approached_road_status');

        $validator
            ->decimal('distance_from_appr_road')
            ->allowEmpty('distance_from_appr_road');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 10)
            ->allowEmpty('village_code');

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
