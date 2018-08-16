<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NregasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NregasTable Test Case
 */
class NregasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NregasTable
     */
    public $Nregas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nregas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Nregas') ? [] : ['className' => NregasTable::class];
        $this->Nregas = TableRegistry::getTableLocator()->get('Nregas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nregas);

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
