<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Healthinfras cell
 */
class HealthinfrasCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('HealthInfras');
        $this->loadModel('Villages');
        $total_village=$this->Villages->find()->count('DISTINCT `village_code`');
        $village_entered= $this->HealthInfras->find()->count('DISTINCT village_code');
        $this->set(compact('total_village','village_entered'));
    }
}
