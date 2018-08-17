<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageInfosTable Test Case
 */
class VillageInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageInfosTable
     */
    public $VillageInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageInfos') ? [] : ['className' => VillageInfosTable::class];
        $this->VillageInfos = TableRegistry::getTableLocator()->get('VillageInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageInfos);

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
