<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Populations Model
 *
 * @method \App\Model\Entity\Population get($primaryKey, $options = [])
 * @method \App\Model\Entity\Population newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Population[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Population|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Population|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Population patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Population[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Population findOrCreate($search, callable $callback = null, $options = [])
 */
class PopulationsTable extends Table
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

        $this->setTable('populations');
        $this->setDisplayField('Array');
        $this->setPrimaryKey([ 'reference_year', 'village_code','counting_agency']);

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
            ->integer('reference_year')
            ->allowEmpty('reference_year', 'create');

        $validator
            ->integer('total_household')
            ->allowEmpty('total_household');

        $validator
            ->integer('total_population')
            ->allowEmpty('total_population');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code', 'create');

        $validator
            ->integer('counting_agency')
            ->allowEmpty('counting_agency', 'create');

        return $validator;
    }

    //public function buildRules(RulesChecker $rules)
   // {
        //$rules->add($rules->isUnique([ 'reference_year', 'village_code','counting_agency']));

        //return $rules;
    //}

    public function checkRecord($reference_year=null,$village_code=null,$counting_agency=null){
        $recordexist=$this->exists(['reference_year'=>$reference_year,'village_code'=>$village_code,'counting_agency'=>$counting_agency]);
          return $recordexist;
    }
}
