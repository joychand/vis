<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageSchemesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageSchemesTable Test Case
 */
class VillageSchemesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageSchemesTable
     */
    public $VillageSchemes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_schemes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageSchemes') ? [] : ['className' => VillageSchemesTable::class];
        $this->VillageSchemes = TableRegistry::getTableLocator()->get('VillageSchemes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageSchemes);

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
