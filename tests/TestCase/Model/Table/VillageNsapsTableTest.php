<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageNsapsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageNsapsTable Test Case
 */
class VillageNsapsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageNsapsTable
     */
    public $VillageNsaps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_nsaps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageNsaps') ? [] : ['className' => VillageNsapsTable::class];
        $this->VillageNsaps = TableRegistry::getTableLocator()->get('VillageNsaps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageNsaps);

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
}
