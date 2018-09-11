<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scheme Entity
 *
 * @property string $scheme_name
 * @property int $department_id
 * @property int $scheme_code
 * @property int $scheme_financial_year
 * @property string $scheme_status
 * @property float $sanction_amount
 *
 * @property \App\Model\Entity\Department $department
 */
class Scheme extends Entity
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
        'scheme_name' => true,
        'department_id' => true,
        'scheme_financial_year' => true,
        'scheme_status' => true,
        'sanction_amount' => true,
        'department' => true
    ];
}
