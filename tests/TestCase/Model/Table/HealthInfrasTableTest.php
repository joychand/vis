<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HealthInfrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HealthInfrasTable Test Case
 */
class HealthInfrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HealthInfrasTable
     */
    public $HealthInfras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.health_infras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HealthInfras') ? [] : ['className' => HealthInfrasTable::class];
        $this->HealthInfras = TableRegistry::getTableLocator()->get('HealthInfras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HealthInfras);

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
