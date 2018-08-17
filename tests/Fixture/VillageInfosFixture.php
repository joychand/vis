<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VillageInfosFixture
 *
 */
class VillageInfosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'village_info_id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'village_photo1' => ['type' => 'binary', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'village_photo2' => ['type' => 'binary', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'village_photo3' => ['type' => 'binary', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'distance_from_ib' => ['type' => 'decimal', 'length' => 6, 'default' => null, 'null' => true, 'comment' => 'Distance from International Border in Km', 'precision' => 2, 'unsigned' => null],
        'village_code' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fki_fkey_villages_village_info' => ['type' => 'index', 'columns' => ['village_code'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['village_info_id'], 'length' => []],
            'fkey_villages_village_info' => ['type' => 'foreign', 'columns' => ['village_code'], 'references' => ['villages', 'village_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'village_info_id' => 1,
                'village_photo1' => 'Lorem ipsum dolor sit amet',
                'village_photo2' => 'Lorem ipsum dolor sit amet',
                'village_photo3' => 'Lorem ipsum dolor sit amet',
                'distance_from_ib' => 1.5,
                'village_code' => 'Lore'
            ],
        ];
        parent::init();
    }
}
