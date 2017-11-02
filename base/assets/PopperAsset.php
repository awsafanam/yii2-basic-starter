<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Popper files.
 *
 * @author Awsaf Anam Chowdhury <awsaf.anam@gmail.com>
 * @since 2.0
 */
class PopperAsset extends AssetBundle
{
    public $sourcePath = '@bower/popper.js/dist';
    public $js = [
        'umd/popper.js',
    ];
    public $depends = [];
}
