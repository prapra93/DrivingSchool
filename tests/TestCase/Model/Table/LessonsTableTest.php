<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LessonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LessonsTable Test Case
 */
class LessonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LessonsTable
     */
    public $Lessons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lessons',
        'app.users',
        'app.customers',
        'app.vehicules',
        'app.lessons_vehicules',
        'app.files',
        'app.lessons_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lessons') ? [] : ['className' => LessonsTable::class];
        $this->Lessons = TableRegistry::get('Lessons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lessons);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
