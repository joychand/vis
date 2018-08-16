<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageNsap Entity
 *
 * @property int $village_nsap_id
 * @property int $total_widows_beneficiary
 * @property int $total_handicap_beneficiary
 * @property int $total_ignoaps_beneficiary
 * @property string $village_code
 */
class VillageNsap extends Entity
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
        'total_widows_beneficiary' => true,
        'total_handicap_beneficiary' => true,
        'total_ignoaps_beneficiary' => true,
        'village_code' => true,
        'reference_year'=>true
    ];
}
