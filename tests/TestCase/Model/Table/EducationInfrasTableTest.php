<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationInfrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationInfrasTable Test Case
 */
class EducationInfrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationInfrasTable
     */
    public $EducationInfras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_infras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EducationInfras') ? [] : ['className' => EducationInfrasTable::class];
        $this->EducationInfras = TableRegistry::getTableLocator()->get('EducationInfras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationInfras);

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
