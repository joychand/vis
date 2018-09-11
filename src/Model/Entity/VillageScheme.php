<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillageScheme Entity
 *
 * @property int $village_scheme_id
 * @property string $village_code
 * @property int $scheme_financial_year
 * @property int $sanction_amount
 * @property float $location_latitude
 * @property float $location_longitude
 * @property string $scheme_status
 * @property string $scheme_code
 */
class VillageScheme extends Entity
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
        'village_code' => true,
        'village_scheme_start_fin_yr' => true,
        'village_scheme_description' => true,
        'scheme_code' => true
    ];
}
