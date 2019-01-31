<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConnectivityInfrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConnectivityInfrasTable Test Case
 */
class ConnectivityInfrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConnectivityInfrasTable
     */
    public $ConnectivityInfras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.connectivity_infras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConnectivityInfras') ? [] : ['className' => ConnectivityInfrasTable::class];
        $this->ConnectivityInfras = TableRegistry::getTableLocator()->get('ConnectivityInfras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConnectivityInfras);

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
