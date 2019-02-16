<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $user_creation_date
 * @property string $user_name
 * @property string $user_pass
 * @property string $user_email
 * @property string $user_mobile
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_creation_date' => true,
        'user_name' => true,
        'password' => true,
        'user_email' => true,
        'user_mobile' => true,
        'role_id'=>true,
        'user_id'=>true
    ];

   protected function _setPassword($value)
   {
       if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
         //   print_r($hasher->hash($value));
           return $hasher->hash($value);
        }
    }
}
