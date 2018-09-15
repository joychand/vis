<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schemes Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 *
 * @method \App\Model\Entity\Scheme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scheme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Scheme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scheme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scheme|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scheme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scheme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scheme findOrCreate($search, callable $callback = null, $options = [])
 */
class SchemesTable extends Table
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

        $this->setTable('schemes');
        $this->setDisplayField('scheme_code');
        $this->setPrimaryKey('scheme_code');

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);

        $this->hasMany('VillageSchemes',[
            'foreignKey'=>'scheme_code',
            'dependent'=>true

        ]);
        
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
            ->scalar('scheme_name')
            ->maxLength('scheme_name', 100)
            ->allowEmpty('scheme_name');

        $validator
            ->integer('scheme_code')
            ->allowEmpty('scheme_code', 'create');

        $validator
            ->integer('scheme_financial_year')
            ->allowEmpty('scheme_financial_year');

        $validator
            ->scalar('scheme_status')
            ->maxLength('scheme_status', 20)
            ->allowEmpty('scheme_status');

        $validator
            ->decimal('sanction_amount')
            ->allowEmpty('sanction_amount');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['department_id'], 'Departments'));

        return $rules;
    }
}
