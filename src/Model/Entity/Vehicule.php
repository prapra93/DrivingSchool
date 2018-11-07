<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicule Entity
 *
 * @property int $id
 * @property string $make
 * @property string $model
 * @property string $plate
 * @property string $created
 * @property string $modified
 * @property int $user_id
 * @property int $subcategory_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Lesson[] $lessons
 * @property \App\Model\Entity\Subcategory $subcategory
 */
class Vehicule extends Entity
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
        'make' => true,
        'model' => true,
        'plate' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'subcategory_id' => true,
        'user' => true,
        'lessons' => true,
        'subcategory' => true,
        'subcourse' => true,
        'subcourse_id' => true
    ];
}
