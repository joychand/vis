<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageDisableInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageDisableInfosTable Test Case
 */
class VillageDisableInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageDisableInfosTable
     */
    public $VillageDisableInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_disable_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageDisableInfos') ? [] : ['className' => VillageDisableInfosTable::class];
        $this->VillageDisableInfos = TableRegistry::getTableLocator()->get('VillageDisableInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageDisableInfos);

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
