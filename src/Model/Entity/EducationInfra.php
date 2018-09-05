<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EducationInfra Entity
 *
 * @property int $education_infra_id
 * @property int $education_reference_year
 * @property int $total_govt_school
 * @property int $total_adc_school
 * @property int $total_private_school
 * @property int $total_primary_school
 * @property int $total_primary_student
 * @property int $total_jhs
 * @property int $total_jhs_student
 * @property int $total_secondary_school
 * @property int $total_secondary_student
 * @property int $total_hrsec_school
 * @property int $total_hrsec_student
 * @property int $total_college
 * @property int $total_college_professor
 * @property int $total_college_assoc_prof
 * @property int $total_college_asstt_prof
 * @property string $village_code
 */
class EducationInfra extends Entity
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
        'education_reference_year' => true,
        'total_govt_school' => true,
        'total_adc_school' => true,
        'total_private_school' => true,
        'total_primary_school' => true,
        'total_primary_student' => true,
        'total_primary_teacher' => true,
        'total_jhs' => true,
        'total_jhs_student' => true,
        'total_jhs_teacher' => true,
        'total_secondary_school' => true,
        'total_secondary_student' => true,
        'total_secondary_teacher' => true,
        'total_hrsec_school' => true,
        'total_hrsec_student' => true,
        'total_hrsec_teacher' => true,
        'village_code' => true
    ];
}
