<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HealthInfra Entity
 *
 * @property int $health_infra_id
 * @property int $health_reference_year
 * @property int $no_of_chc
 * @property int $no_of_phc
 * @property int $no_of_phsc
 * @property int $no_of_doctors
 * @property int $no_of_anm
 * @property int $no_of_staff_nurse
 * @property int $no_of_asha
 * @property string $asha_mobile
 * @property string $village_code
 */
class HealthInfra extends Entity
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
        'health_reference_year' => true,
        'name_of_health_centre' => true,
        'no_of_doctors' => true,
        'no_of_anm' => true,
        'no_of_staff_nurse' => true,
        'no_of_asha' => true,
        'asha_mobile' => true,
        'village_code' => true
    ];
}
