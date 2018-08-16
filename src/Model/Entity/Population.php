<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Population Entity
 *
 * @property int $reference_year
 * @property int $total_household
 * @property int $total_population
 * @property string $village_code
 * @property int $counting_agency
 *
 * @property \App\Model\Entity\Population $population
 */
class Population extends Entity
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
        'total_household' => true,
        'total_population' => true,
        '*' => true
    ];
}
