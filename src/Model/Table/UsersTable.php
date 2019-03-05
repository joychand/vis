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
        $this->hasOne('UsersRoles');
        //->setForeignKey('role_id');

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
            ->notEmpty('user_name','User_Name cannot be blank')
            ->add('user_name','custom',[
                'rule'=>function($value, $context){
                    return (bool)preg_match('/^(?=.*[a-z])([a-z._]).{3,20}$/',$value);
                },
                'message'=>'User name should be atleast 3 characters of a-z (lowerCase) only and may contain . and _ characters'
            ]);

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
            ])
            ->add('password',['custom'=>[ 
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,}$/', $value); //Return true if password is strengh is valid * had to typcast as preg_match only returns 0|1     
                },
                'last'=>'true',
                'message' => 'Password Must be of length 8 or more with atleast one UpperCase and one lowercase and one digit [0-9] and one character [!#$@$].']
            ]) ;    
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
        // ->add('currentPassword','requirePresence',[
        //     'rule'=>'requirePresence',
        //      'on'=>'update'
        // ])
           // ->requirePresence('currentPassword',['on'=>'update'])
            ->notEmpty('currentPassword', 'Please enter your current password',['on'=>'update'])
            
            
            ->add('currentPassword','custom',[
              'rule' => function($value,$context){
                $query = $this->find()->where(['user_id'=>$context['data']['user_id']])->first();
                $data = $query->toArray();
                return(new DefaultPasswordHasher)->check($value,$data['password']);
              },
              'message' => 'Current password is invalid',
                 'on'=>'update'
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

        public function getUserByName($user_name=null)
        {
            $user=$this->find()->select('user_id')->where(['user_name'=>$user_name])->first();
            if($user)
            {
                return $user->user_id;

            }
            else 
              return 0;
        }
}
