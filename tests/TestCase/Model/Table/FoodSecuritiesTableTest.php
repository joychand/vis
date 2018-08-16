<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodSecuritiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodSecuritiesTable Test Case
 */
class FoodSecuritiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodSecuritiesTable
     */
    public $FoodSecurities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.food_securities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoodSecurities') ? [] : ['className' => FoodSecuritiesTable::class];
        $this->FoodSecurities = TableRegistry::getTableLocator()->get('FoodSecurities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoodSecurities);

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
