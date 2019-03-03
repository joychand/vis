<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersRole Entity
 *
 * @property int $users_role_id
 * @property string $user_role_name
 */
class UsersRole extends Entity
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
        'user_role_name' => true
    ];
}
