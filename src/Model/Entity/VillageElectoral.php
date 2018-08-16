<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageElectoral Entity
 *
 * @property int $village_electoral_id
 * @property int $reference_year
 * @property int $electoral_total_household
 * @property int $electoral_total_voter
 * @property string $village_code
 */
class VillageElectoral extends Entity
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
        'reference_year' => true,
        'electoral_total_household' => true,
        'electoral_total_voter' => true,
        'village_code' => true
    ];
}
