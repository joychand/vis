<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageElectoralsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageElectoralsTable Test Case
 */
class VillageElectoralsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageElectoralsTable
     */
    public $VillageElectorals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_electorals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageElectorals') ? [] : ['className' => VillageElectoralsTable::class];
        $this->VillageElectorals = TableRegistry::getTableLocator()->get('VillageElectorals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageElectorals);

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
