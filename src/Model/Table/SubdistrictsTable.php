<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subdistricts Model
 *
 * @method \App\Model\Entity\Subdistrict get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subdistrict newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subdistrict[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subdistrict|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subdistrict|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subdistrict patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subdistrict[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subdistrict findOrCreate($search, callable $callback = null, $options = [])
 */
class SubdistrictsTable extends Table
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

        $this->setTable('subdistricts');
        $this->setDisplayField('subdistrict_name');
        $this->setPrimaryKey('subdistrict_code');
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
            ->scalar('subdistrict_code')
            ->maxLength('subdistrict_code', 30)
            ->allowEmpty('subdistrict_code', 'create');

        $validator
            ->integer('subdistrict_version')
            ->allowEmpty('subdistrict_version');

        $validator
            ->scalar('subdistrict_name')
            ->maxLength('subdistrict_name', 100)
            ->allowEmpty('subdistrict_name');

        $validator
            ->scalar('subdistrict_name_local')
            ->maxLength('subdistrict_name_local', 100)
            ->allowEmpty('subdistrict_name_local');

        $validator
            ->scalar('district_code')
            ->maxLength('district_code', 20)
            ->allowEmpty('district_code');

        $validator
            ->scalar('census2001_code')
            ->maxLength('census2001_code', 20)
            ->allowEmpty('census2001_code');

        $validator
            ->scalar('census2011_code')
            ->maxLength('census2011_code', 20)
            ->allowEmpty('census2011_code');

        return $validator;
    }
}
