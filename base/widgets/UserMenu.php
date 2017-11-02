<?php
/**
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;

/**
 * @author Awsaf Anam Chowdhury<awsaf.anam.com>
 */
class UserMenu extends Widget
{
    /**
     * @var array of menu items
     */
    public $items = [];


    public function init()
    {
        parent::init();
        if (!Yii::$app->user->isGuest) {
            $this->items = [
                [
                    'label' => 'Dashboard', 
                    'url' => ['/account'],
                    'active' => Yii::$app->controller->id == 'default' && 
                                    Yii::$app->controller->action->id == 'index',
                    'icon' => 'fa-home'
                ],
                [
                    'label' => 'Your History', 
                    'url' => ['/account/questions/history'],
                    'active' => Yii::$app->controller->id == 'questions' && 
                                    Yii::$app->controller->action->id == 'history',
                    'icon' => 'fa-search-plus'
                ],
                [
                    'label' => 'Your Mistakes', 
                    'url' => ['/account/questions/mistakes'],
                    'active' => Yii::$app->controller->id == 'questions' && 
                                    Yii::$app->controller->action->id == 'mistakes',
                    'icon' => 'fa-history'
                ],
                [
                    'label' => 'Your Question Bank', 
                    'url' => ['/account/questions/my-bank'],
                    'active' => Yii::$app->controller->id == 'questions' && 
                                    Yii::$app->controller->action->id == 'my-bank',
                    'icon' => 'fa-bank'
                ],
                [
                    'label' => 'Your Watch List', 
                    'url' => ['/account/watch-list'],
                    'active' => Yii::$app->controller->id == 'watch-list',
                    'icon' => 'fa-binoculars'
                ],
                [
                    'label' => 'Your Exam Results', 
                    'url' => ['/account/results'],
                    'active' => Yii::$app->controller->id == 'results' && 
                                    Yii::$app->controller->action->id == 'index',
                    'icon' => 'fa-bank'
                ],
                [
                    'label' => 'Your Short Exam Results', 
                    'url' => ['/account/results/short'],
                    'active' => Yii::$app->controller->id == 'results' && 
                                    Yii::$app->controller->action->id == 'short',
                    'icon' => 'fa-bank'
                ],
                [
                    'label' => 'Your Referrals', 
                    'url' => ['/account/default/referral'],
                    'active' => Yii::$app->controller->id == 'default' && 
                                    Yii::$app->controller->action->id == 'referral',
                    'icon' => 'fa-link'
                ],
                [
                    'label' => 'Your Settings', 
                    'url' => ['/user/settings'],
                    'active' => Yii::$app->controller->module->id == 'user',
                    'icon' => 'fa-wrench'
                ]
            ];
        }
    }
    
    public function run() 
    {
        return $this->render('user_menu', ['items'=> $this->items]);
    }
}
