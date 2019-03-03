<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LoginHistories cell
 */
class LoginHistoriesCell extends Cell
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
    public function display($user_id=null)
    {
        $this->loadModel('UserAudits');
        $last_login=$this->UserAudits->find()->select(['last_login'])->where(['user_id'=>$user_id])->first();
        $this->set(compact('last_login',$last_login));
    }
}
