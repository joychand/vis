<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConnectivityInfrasFixture
 *
 */
class ConnectivityInfrasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'approached_road_status' => ['type' => 'string', 'fixed' => true, 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'distance_from_appr_road' => ['type' => 'decimal', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 2, 'unsigned' => null],
        'village_code' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'reference_year' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fki_villages_conectivity_infra_fk' => ['type' => 'index', 'columns' => ['village_code'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'villages_conectivity_infra_fk' => ['type' => 'foreign', 'columns' => ['village_code'], 'references' => ['villages', 'village_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'approached_road_status' => 'Lorem ipsum dolor sit amet',
                'distance_from_appr_road' => 1.5,
                'village_code' => 'Lorem ip',
                'reference_year' => 1
            ],
        ];
        parent::init();
    }
}
