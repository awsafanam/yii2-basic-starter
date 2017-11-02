<?php
/**
 */

namespace app\widgets;

use Yii;
use yii\bootstrap\Progress as yiiProgress;
/**
 * @author Awsaf Anam Chowdhury<awsaf.anam.com>
 */
class Progress extends \yii\base\Widget
{
    
    public $negetive = 0;
    public $total = 0;
    public $negetiveAsMark = False;
    public $revarse = False;
    
    public function run() 
    {
        if($this->total > 0 && $this->negetive > 0) {
            if($this->negetiveAsMark) {
                $percent = number_format(( $this->negetive / $this->total) * 100, 2);
            } else {
                $percent = number_format(( ($this->total - $this->negetive) / $this->total) * 100, 2);
            }
        } else {
            $percent = 0;
        }
        if($this->revarse) {
            $a = 'progress-bar-danger';
            $b = 'progress-bar-warning';
            $c = 'progress-bar-info';
            $d = 'progress-bar-success';
        } else {
            $a = 'progress-bar-info';
            $b = 'progress-bar-info';
            $c = 'progress-bar-warning';
            $d = 'progress-bar-danger';
        }
        if($percent > 80) {
            echo yiiProgress::widget([
                'percent' => $percent,
                'label' => $percent . '%',
                'barOptions' => ['class' => $a],
                'options' => ['class' => 'active progress-striped']
            ]);
        } elseif($percent > 60) {
            echo yiiProgress::widget([
                'percent' => $percent,
                'label' => $percent . '%',
                'barOptions' => ['class' => $b],
                'options' => ['class' => 'active progress-striped']
            ]);
        } elseif($percent > 40) {
            echo yiiProgress::widget([
                'percent' => $percent,
                'label' => $percent . '%',
                'barOptions' => ['class' =>$c ],
                'options' => ['class' => 'active progress-striped']
            ]);
        } else {
            if($percent < 2) {
                $class = $d . ' zerolabel';
            } else {
                $class = $d;
            }
            echo yiiProgress::widget([
                'percent' => $percent,
                'label' => $percent . '%',
                'barOptions' => ['class' => $class],
                'options' => ['class' => 'active progress-striped']
            ]);
        }
    }
}
