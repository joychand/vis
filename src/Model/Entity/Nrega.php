<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nrega Entity
 *
 * @property int $village_nrega_id
 * @property int $nrega_reference_year
 * @property int $total_job_card
 * @property string $village_code
 */
class Nrega extends Entity
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
        'nrega_reference_year' => true,
        'total_job_card' => true,
        'village_code' => true
    ];
}
