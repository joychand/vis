<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FoodSecurity Entity
 *
 * @property int $food_security_id
 * @property int $total_aay_members
 * @property int $total_phh_members
 * @property int $total_aadhaar_seeded_card
 * @property int $total_fair_price_shop
 * @property string $village_code
 */
class FoodSecurity extends Entity
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
       
        'total_aay_members' => true,
        'total_phh_members' => true,
        'total_aadhaar_seeded_card' => true,
        'total_fair_price_shop' => true,
        'village_code' => true,
        'reference_year'=>true,
        'total_aay_card'=>true,
        'total_phh_card'=>true
    ];
}
