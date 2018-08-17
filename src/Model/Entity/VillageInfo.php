<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageInfo Entity
 *
 * @property int $village_info_id
 * @property string|resource $village_photo1
 * @property string|resource $village_photo2
 * @property string|resource $village_photo3
 * @property float $distance_from_ib
 * @property string $village_code
 */
class VillageInfo extends Entity
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
        'village_photo1' => true,
        'village_photo2' => true,
        'village_photo3' => true,
        'distance_from_ib' => true,
        'village_code' => true
    ];
}
