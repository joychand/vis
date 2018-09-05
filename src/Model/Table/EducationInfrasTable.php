<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EducationInfras Model
 *
 * @method \App\Model\Entity\EducationInfra get($primaryKey, $options = [])
 * @method \App\Model\Entity\EducationInfra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EducationInfra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EducationInfra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationInfra|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EducationInfra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EducationInfra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EducationInfra findOrCreate($search, callable $callback = null, $options = [])
 */
class EducationInfrasTable extends Table
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

        $this->setTable('education_infras');
        $this->setDisplayField('education_infra_id');
        $this->setPrimaryKey('education_infra_id');
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
            ->integer('education_infra_id')
            ->allowEmpty('education_infra_id', 'create');

        $validator
            ->integer('education_reference_year')
            ->allowEmpty('education_reference_year');

        $validator
            ->integer('total_govt_school')
            ->allowEmpty('total_govt_school');

        $validator
            ->integer('total_adc_school')
            ->allowEmpty('total_adc_school');

        $validator
            ->integer('total_private_school')
            ->allowEmpty('total_private_school');

        $validator
            ->integer('total_primary_school')
            ->allowEmpty('total_primary_school');

        $validator
            ->integer('total_primary_student')
            ->allowEmpty('total_primary_student');
         $validator
            ->integer('total_primary_teacher')
            ->allowEmpty('total_primary_teacher');
         $validator
            ->integer('total_jhs_teacher')
            ->allowEmpty('total_jhs_teacher');
        $validator
            ->integer('total_secondary_teacher')
            ->allowEmpty('total_secondary_teacher');
        $validator
            ->integer('total_hrsec_teacher')
            ->allowEmpty('total_hrsec_teacher');

        $validator
            ->integer('total_jhs')
            ->allowEmpty('total_jhs');

        $validator
            ->integer('total_jhs_student')
            ->allowEmpty('total_jhs_student');

        $validator
            ->integer('total_secondary_school')
            ->allowEmpty('total_secondary_school');

        $validator
            ->integer('total_secondary_student')
            ->allowEmpty('total_secondary_student');

        $validator
            ->integer('total_hrsec_school')
            ->allowEmpty('total_hrsec_school');

        $validator
            ->integer('total_hrsec_student')
            ->allowEmpty('total_hrsec_student');

        $validator
            ->integer('total_college')
            ->allowEmpty('total_college');

        $validator
            ->integer('total_college_professor')
            ->allowEmpty('total_college_professor');

        $validator
            ->integer('total_college_assoc_prof')
            ->allowEmpty('total_college_assoc_prof');

        $validator
            ->integer('total_college_asstt_prof')
            ->allowEmpty('total_college_asstt_prof');

        $validator
            ->scalar('village_code')
            ->maxLength('village_code', 6)
            ->allowEmpty('village_code');

        return $validator;
    }
    public function checkRecord($reference_year=null,$village_code=null){
        $recordexist=$this->exists(['education_reference_year'=>$reference_year,'village_code'=>$village_code]);
        //debug($recordexist);
        return $recordexist;
    }
}
