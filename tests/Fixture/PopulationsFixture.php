<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PopulationsFixture
 *
 */
class PopulationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'reference_year' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'total_household' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'total_population' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'village_code' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'counting_agency' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fki_fkey_villages_populations' => ['type' => 'index', 'columns' => ['village_code'], 'length' => []],
            'fki_fkey_population_agencies' => ['type' => 'index', 'columns' => ['counting_agency'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['reference_year', 'village_code', 'counting_agency'], 'length' => []],
            'fkey_agencies_populations' => ['type' => 'foreign', 'columns' => ['counting_agency'], 'references' => ['agencies', 'agency_id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fkey_villages_populations' => ['type' => 'foreign', 'columns' => ['village_code'], 'references' => ['villages', 'village_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'reference_year' => 1,
                'total_household' => 1,
                'total_population' => 1,
                'village_code' => '2a5edd7e-e3a9-4144-81c4-d280d61fc5c0',
                'counting_agency' => 1
            ],
        ];
        parent::init();
    }
}
