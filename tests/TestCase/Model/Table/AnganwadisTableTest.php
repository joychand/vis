<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnganwadisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnganwadisTable Test Case
 */
class AnganwadisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnganwadisTable
     */
    public $Anganwadis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.anganwadis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Anganwadis') ? [] : ['className' => AnganwadisTable::class];
        $this->Anganwadis = TableRegistry::getTableLocator()->get('Anganwadis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Anganwadis);

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
