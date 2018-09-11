<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchemesFixture
 *
 */
class SchemesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'scheme_name' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'department_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'scheme_code' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'scheme_financial_year' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'scheme_status' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'sanction_amount' => ['type' => 'decimal', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 3, 'unsigned' => null],
        '_indexes' => [
            'fki_fkey_departments_schemes' => ['type' => 'index', 'columns' => ['department_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['scheme_code'], 'length' => []],
            'fkey_departments_schemes' => ['type' => 'foreign', 'columns' => ['department_id'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'scheme_name' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'scheme_code' => 1,
                'scheme_financial_year' => 1,
                'scheme_status' => 'Lorem ipsum dolor ',
                'sanction_amount' => 1.5
            ],
        ];
        parent::init();
    }
}
