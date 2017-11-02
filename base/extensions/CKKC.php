<?php
namespace common\extensions;

use Yii;
use yii\helpers\ArrayHelper;
use common\extensions\kcfinder\KCFinderAsset;
use common\extensions\kcfinder\KCFinder;

class CKKC extends \app\extensions\ckeditor\CKEditor
{

    public $enableKCFinder = true;

    /**
     * Registers CKEditor plugin
     */
    protected function registerPlugin()
    {
        if ($this->enableKCFinder)
        {
            $this->registerKCFinder();
        }

        parent::registerPlugin();
    }

    /**
     * Registers KCFinder
     */
    protected function registerKCFinder()
    {
        $register = KCFinderAsset::register($this->view);
        $kcfinderUrl = $register->baseUrl;

        $browseOptions = [
            'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
            'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
            'filebrowserImageUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
        ];

        $this->clientOptions = ArrayHelper::merge($browseOptions, $this->clientOptions);
        
               
        $kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
            'uploadURL' => Yii::$app->params['frontend'] . '/uploads',
            'uploadDir' => Yii::getAlias('@frontend').'/web/uploads',            
            'types' => [
                // (F)CKEditor types
                'files'   =>  "*",
                'flash'   =>  "swf",
                'images'  =>  "*img",

                // TinyMCE types
                'file'    =>  "*",
                'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
                'image'   =>  "*img",
            ],
            'access' => [
                'files' => [
                    'upload' => true,
                    'delete' => TRUE,
                    'copy' => TRUE,
                    'move' => TRUE,
                    'rename' => TRUE,
                ],
                'dirs' => [
                    'create' => true,
                    'delete' => TRUE,
                    'rename' => TRUE,
                ],
            ],
        ]);
        // Set kcfinder session options
        Yii::$app->session->set('KCFINDER', $kcfOptions);
    }

}