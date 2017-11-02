<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets\multi;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MultiAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/multi/assets';
    
    public $css = [
        'css/bootstrap-multiselect.css',
    ];
    public $js = [
        'js/bootstrap-multiselect.js'
    ];
    
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
