<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Village Entity
 *
 * @property int $village_version
 * @property string $village_code
 * @property string $village_name
 * @property string $sub_district_code
 * @property string $census_2001_code
 * @property string $census_2011_code
 */
class Village extends Entity
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
        'village_version' => true,
        'village_name' => true,
        'sub_district_code' => true,
        'census_2001_code' => true,
        'census_2011_code' => true
    ];
}
