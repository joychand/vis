<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VillagePhoto Entity
 *
 * @property int $id
 * @property string $photo
 * @property string $photo_dir
 * @property string $photo_type
 * @property string $photo_size
 * @property string $village_code
 */
class VillagePhoto extends Entity
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
        'photo' => true,
        'photo_dir' => true,
        'photo_type' => true,
        'photo_size' => true,
        'village_code' => true
    ];
}
