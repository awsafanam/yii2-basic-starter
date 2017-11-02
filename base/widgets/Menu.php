<?php
/**
 */

namespace app\widgets;

use app\models\Subscriber;
use Yii;
use yii\base\Widget;

/**
 * @author Awsaf Anam Chowdhury<awsaf.anam.com>
 */
class Menu extends Widget
{
    /**
     * @var array of menu items
     */
    public $items = [];


    public function init()
    {
        parent::init();

        if(
            Yii::$app->controller->module &&
            (
                Yii::$app->controller->module->id == 'manage' ||
                Yii::$app->controller->module->id == 'admin' ||
                Yii::$app->controller->module->id == 'user'
            )
        ) {
            // Admin Menu
            $this->items = [
                [
                    'label' => 'Home',
                    'icon' => 'fa fa-home',
                    'url' => ['/site/index']
                ],
                [
                    'label' => 'User Management',
                    'icon' => 'fa fa-user',
                    'url' => ['/user/admin']
                ],
                [
                    'label' => 'Roll Management',
                    'icon' => 'fa fa-gear',
                    'url' => ['/admin']
                ]
            ];
        } else {
            // General User Menu
            $this->items = [
                [
                    'label' => 'Home',
                    'url' => ['/site/index'],
                    'active' => Yii::$app->controller->id == 'site' &&
                        Yii::$app->controller->action->id == 'index'
                ],
                [
                    'label' => 'BCS',
                    'url' => ['/course/bcs'],
                    'active' => Yii::$app->controller->id == 'course' &&
                                    (isset($_GET['alias']) && $_GET['alias'] == 'bcs')
                ],
                [
                    'label' => 'BCS Model Tests',
                    'url' => ['/exams/bcs'],
                    'active' => Yii::$app->controller->id == 'exams' &&
                                    Yii::$app->controller->action->id == 'bcs'
                ],
                [
                    'label' => 'Bank Job',
                    'url' => ['/course/bank-job'],
                    'active' => Yii::$app->controller->id == 'course' &&
                                    (isset($_GET['alias']) && $_GET['alias'] == 'bank-job')
                ],
                [
                    'label' => 'Bank Job Model Tests',
                    'url' => ['/exams/bank-job'],
                    'active' => Yii::$app->controller->id == 'exams' &&
                                    Yii::$app->controller->action->id == 'bank-job'
                ],
                [
                    'label' => 'Current Affairs',
                    'url' => ['/current-affairs'],
                    'active' => Yii::$app->controller->id == 'current-affairs'
                ],
                [
                    'label' => 'Blog',
                    'url' => ['/blog'],
                ],
            ];
        }
        $this->items[] = [
            'label' => 'Logout',
            'icon' => 'fa fa-sign-out',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    
    public function run() 
    {
        return $this->render('menu', [
            'items'=> $this->items
        ]);
    }
}
