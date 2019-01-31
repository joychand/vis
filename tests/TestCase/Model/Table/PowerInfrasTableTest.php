<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PowerInfrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PowerInfrasTable Test Case
 */
class PowerInfrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PowerInfrasTable
     */
    public $PowerInfras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.power_infras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PowerInfras') ? [] : ['className' => PowerInfrasTable::class];
        $this->PowerInfras = TableRegistry::getTableLocator()->get('PowerInfras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PowerInfras);

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
