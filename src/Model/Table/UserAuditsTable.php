<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserAudits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserAudit get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserAudit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserAudit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserAudit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAudit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAudit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserAudit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserAudit findOrCreate($search, callable $callback = null, $options = [])
 */
class UserAuditsTable extends Table
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

        $this->setTable('user_audits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('last_login')
            ->allowEmpty('last_login');

        $validator
            ->dateTime('last_fail_login')
            ->allowEmpty('last_fail_login');

        $validator
            ->scalar('fail_browser')
            ->maxLength('fail_browser', 300)
            ->allowEmpty('fail_browser');

        $validator
            ->scalar('success_browser')
            ->maxLength('success_browser', 300)
            ->allowEmpty('success_browser');

        $validator
            ->scalar('fail_ip')
            ->maxLength('fail_ip', 50)
            ->allowEmpty('fail_ip');

        $validator
            ->scalar('success_ip')
            ->maxLength('success_ip', 50)
            ->allowEmpty('success_ip');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }   

    public function logFail($user_id,$client_ip, $client_browser)
    {

        //$userAudit=$this->exists(['user_id'=>$user_id]);
        $userAudit=$this->find()->where(['user_id'=>$user_id]);
        //dump($userAudit);
        if(!$userAudit)
        {
            $userAudit = $this->newEntity();
            $userAudit->user_id=$user_id;
            $userAudit->fail_ip=$client_ip;
            $userAudit->fail_browser=$client_browser;
            $this->save($userAudit);
        }
        else
        {
            $userAudit = $this->patchEntity($nercormp, $this->request->getData());
            $userAudit->fail_ip=$client_ip;
            $userAudit->fail_browser=$client_browser;
           
            $this->save($userAudit);
        }
        
    }

    
}
