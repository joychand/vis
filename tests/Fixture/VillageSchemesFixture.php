<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VillageSchemesFixture
 *
 */
class VillageSchemesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'village_scheme_id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'village_code' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'scheme_financial_year' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'sanction_amount' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'location_latitude' => ['type' => 'decimal', 'length' => 9, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'location_longitude' => ['type' => 'decimal', 'length' => 9, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6, 'unsigned' => null],
        'scheme_status' => ['type' => 'string', 'fixed' => true, 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'scheme_code' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['village_scheme_id'], 'length' => []],
            'Village_Scheme_scheme_code_fkey' => ['type' => 'foreign', 'columns' => ['scheme_code'], 'references' => ['schemes', 'scheme_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'Village_Scheme_village_code_fkey' => ['type' => 'foreign', 'columns' => ['village_code'], 'references' => ['villages', 'village_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'village_scheme_id' => 1,
                'village_code' => 'Lore',
                'scheme_financial_year' => 1,
                'sanction_amount' => 1,
                'location_latitude' => 1.5,
                'location_longitude' => 1.5,
                'scheme_status' => 'Lorem ipsum dolor sit amet',
                'scheme_code' => 'Lorem ip'
            ],
        ];
        parent::init();
    }
}
