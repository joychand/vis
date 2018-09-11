<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VillageSchemes Model
 *
 * @method \App\Model\Entity\VillageScheme get($primaryKey, $options = [])
 * @method \App\Model\Entity\VillageScheme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VillageScheme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VillageScheme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageScheme|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VillageScheme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VillageScheme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VillageScheme findOrCreate($search, callable $callback = null, $options = [])
 */
class VillageSchemesTable extends Table
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

        $this->setTable('village_schemes');
        $this->setDisplayField('village_scheme_id');
        $this->setPrimaryKey('village_scheme_id');

        $this->belongsTo('Villages',[
            'className'=>'Villages'
        ])
        ->setForeignKey('village_code');

        $this->belongsTo('schemes',[
            'className'=>'schemes'
        ])
        ->setForeignKey('scheme_code');


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
            ->integer('village_scheme_id')
            ->allowEmpty('village_scheme_id', 'create');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        $validator
            ->scalar('village_scheme_start_fin_yr')
            ->allowEmpty('village_scheme_start_fin_yr');

        
        $validator
            ->scalar('village_scheme_description')
            ->allowEmpty('village_scheme_description');

        $validator
            ->integer('scheme_code')
            ->allowEmpty('scheme_code');

        return $validator;
    }
}
