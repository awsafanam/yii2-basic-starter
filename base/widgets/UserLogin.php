<?php
/**
 */

namespace app\widgets;

use app\models\LoginForm;
use Yii;
/**
 * @author Awsaf Anam Chowdhury<awsaf.anam.com>
 */
class UserLogin extends \yii\base\Widget
{
    public $model;
    
    public function init()
    {
        parent::init();
        $this->model = new LoginForm();
    }
    
    public function run() 
    {
        return $this->render('user_login', ['model'=> $this->model]);
    }
}
