<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VillagesFixture
 *
 */
class VillagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'village_version' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'village_code' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'village_name' => ['type' => 'string', 'length' => 150, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'sub_district_code' => ['type' => 'string', 'length' => 4, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'census_2001_code' => ['type' => 'string', 'length' => 8, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'census_2011_code' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['village_code'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'village_version' => 1,
                'village_code' => '6d5ce036-b0bc-4bb2-a640-ccd411a3bf00',
                'village_name' => 'Lorem ipsum dolor sit amet',
                'sub_district_code' => 'Lo',
                'census_2001_code' => 'Lorem ',
                'census_2011_code' => 'Lore'
            ],
        ];
        parent::init();
    }
}
