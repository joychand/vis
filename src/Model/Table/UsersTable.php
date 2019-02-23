<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');
        $this->belongsTo('users_roles')
        ->setForeignKey('role_id');

        //captcha behaviour
        $this->addBehavior('Captcha.Captcha', [
            'field' => 'securitycode',
            //'secret'=>'' //set secret if it is google recaptcha
        ]);
        //$this->Auth->allow(['logout', 'add']);
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
            ->integer('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->date('user_creation_date')
            ->allowEmpty('user_creation_date');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 50)
            ->allowEmpty('user_name');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmpty('password','Password cannot be blank')
            ->add('password',[
                'compareWith'=>
                [
                'rule'=>['compareWith','confirm_passwd'],
                 'message'=>'Password and Confirm Password do not match'
                 ]
            ]);    
        $validator
            ->notEmpty('confirm_passwd','Confirm Password cannot be blank')
            ->add('confirm_passwd',[
                'compareWith'=>
                [
                'rule'=>['compareWith','password'],
                 'message'=>'Password and Confirm Password do not match'
                 ]
            ]);    
        $validator
            ->scalar('user_email')
            ->maxLength('user_email', 100)
            ->allowEmpty('user_email');

        $validator
            ->scalar('user_mobile')
            ->maxLength('user_mobile', 10)
            ->allowEmpty('user_mobile');

        $validator
            ->requirePresence('currentPassword')
            ->notEmpty('currentPassword', 'Please enter your current password')
            
            
            ->add('currentPassword','custom',[
              'rule' => function($value,$context){
                $query = $this->find()->where(['user_id'=>$context['data']['user_id']])->first();
                $data = $query->toArray();
                return(new DefaultPasswordHasher)->check($value,$data['password']);
              },
              'message' => 'Current password is invalid'
            ]);
        return $validator;
    }


    public function findAuth(\Cake\ORM\Query $query, array $options)
        {
            $query
                ->select([ 'user_name', 'password','role_id','user_id']);
                

            return $query;
        }

    public function userExist($user_name=null)
        {
            $recordexist=$this->exists(['user_name'=>$user_name]);
            return $recordexist;
        }

    public function checkAuthorized($user_id, $id)
        {
            if ($user_id==$id)
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }
}
