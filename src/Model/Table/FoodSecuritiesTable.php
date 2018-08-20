<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FoodSecurities Model
 *
 * @method \App\Model\Entity\FoodSecurity get($primaryKey, $options = [])
 * @method \App\Model\Entity\FoodSecurity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FoodSecurity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FoodSecurity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodSecurity|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodSecurity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FoodSecurity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FoodSecurity findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodSecuritiesTable extends Table
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

        $this->setTable('food_securities');
        $this->setDisplayField('food_security_id');
        $this->setPrimaryKey('food_security_id');
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
            ->integer('food_security_id')
            ->allowEmpty('food_security_id', 'create');

       $validator
            ->integer('reference_year')
            ->allowEmpty('total_aay_members');
        $validator
            ->integer('total_aay_card')
            ->allowEmpty('total_aay_card');
        $validator
            ->integer('total_aay_members')
            ->allowEmpty('total_aay_members');
        $validator
            ->integer('total_phh_card')
            ->allowEmpty('total_aay_card');
        $validator
            ->integer('total_phh_members')
            ->allowEmpty('total_phh_members');

        $validator
            ->integer('total_aadhaar_seeded_card')
            ->allowEmpty('total_aadhaar_seeded_card');

        $validator
            ->integer('total_fair_price_shop')
            ->allowEmpty('total_fair_price_shop');

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
