<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anganwadi Entity
 *
 * @property int $anganwadi_id
 * @property int $anganwadi_reference_year
 * @property int $total_anganwadi_centre
 * @property int $total_anganwadi_worker
 * @property int $total_enrolled_children
 * @property string $worker_mobile
 * @property string $village_code
 */
class Anganwadi extends Entity
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
        'anganwadi_reference_year' => true,
        'total_anganwadi_centre' => true,
        'total_anganwadi_worker' => true,
        'total_enrolled_children' => true,
        'worker_mobile' => true,
        'village_code' => true
    ];
}
