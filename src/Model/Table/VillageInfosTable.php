<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageInfos Model
 *
 * @method \App\Model\Entity\VillageInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageInfo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageInfosTable extends Table
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

        $this->setTable('village_infos');
        $this->setDisplayField('village_info_id');
        $this->setPrimaryKey('village_info_id');
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
            ->integer('village_info_id')
            ->allowEmpty('village_info_id', 'create');

        $validator
            ->allowEmpty('village_photo1');

        $validator
            ->allowEmpty('village_photo2');

        $validator
            ->allowEmpty('village_photo3');

        $validator
            ->decimal('distance_from_ib')
            ->notEmpty('distance_from_ib','Distance to be entered');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        return $validator;
    }
}
