<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $created
 * @property string $modified
 * @property string $activation
 * @property string $uuid
 * @property string $token
 * @property string $hashval
 *
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Lesson[] $lessons
 * @property \App\Model\Entity\Vehicule[] $vehicules
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
        'activation' => true,
        'uuid' => true,
        'token' => true,
        'hashval' => true,
        'customers' => true,
        'files' => true,
        'lessons' => true,
        'vehicules' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
