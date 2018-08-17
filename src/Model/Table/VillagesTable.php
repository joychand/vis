<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Villages Model
 *
 * @method \App\Model\Entity\Village get($primaryKey, $options = [])
 * @method \App\Model\Entity\Village newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Village[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Village|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Village|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Village patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Village[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Village findOrCreate($search, callable $callback = null, $options = [])
 */
class VillagesTable extends Table
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

        $this->setTable('villages');
        $this->setDisplayField('village_code');
        $this->setPrimaryKey('village_code');
        $this->hasOne('Villageinfos')
            ->setForeignKey('village_code')
            ->setDependent(true);
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
            ->integer('village_version')
            ->allowEmpty('village_version');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code', 'create');

        $validator
            ->scalar('village_name')
            ->maxLength('village_name', 150)
            ->allowEmpty('village_name');

        $validator
            ->scalar('sub_district_code')
            ->maxLength('sub_district_code', 4)
            ->allowEmpty('sub_district_code');

        $validator
            ->scalar('census_2001_code')
            ->maxLength('census_2001_code', 8)
            ->allowEmpty('census_2001_code');

        $validator
            ->scalar('census_2011_code')
            ->maxLength('census_2011_code', 6)
            ->allowEmpty('census_2011_code');

        return $validator;
    }
}
