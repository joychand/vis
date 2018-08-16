<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillagePhotosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillagePhotosTable Test Case
 */
class VillagePhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillagePhotosTable
     */
    public $VillagePhotos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.village_photos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillagePhotos') ? [] : ['className' => VillagePhotosTable::class];
        $this->VillagePhotos = TableRegistry::getTableLocator()->get('VillagePhotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillagePhotos);

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
