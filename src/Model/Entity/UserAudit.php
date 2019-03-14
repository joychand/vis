<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserAudit Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $last_login
 * @property \Cake\I18n\FrozenTime $last_fail_login
 * @property string $fail_browser
 * @property string $success_browser
 * @property string $fail_ip
 * @property string $success_ip
 *
 * @property \App\Model\Entity\User $user
 */
class UserAudit extends Entity
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
        'user_id' => true,
        'login' => true,
        'last_login' => true,
        'last_fail_login' => true,
        'fail_browser' => true,
        'success_browser' => true,
        'last_success_browser' => true,
        'fail_ip' => true,
        'success_ip' => true,
        'last_success_ip' => true,
        'user' => true,
        'fail_login_attempt'=>true
    ];
}
