<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LessonsVehiculesFixture
 *
 */
class LessonsVehiculesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'lesson_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'vehicule_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['lesson_id', 'vehicule_id'], 'length' => []],
            'sqlite_autoindex_lessons_vehicules_1' => ['type' => 'unique', 'columns' => ['lesson_id', 'vehicule_id'], 'length' => []],
            'vehicule_id_fk' => ['type' => 'foreign', 'columns' => ['vehicule_id'], 'references' => ['vehicules', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'lesson_id' => 1,
            'vehicule_id' => 1
        ],
    ];
}
