<?php

namespace widgets\xeditor;

use yii\web\AssetBundle;

class EditorAssets extends AssetBundle {

    public $sourcePath = '@vendor/shahimian/yii2-xeditor/assets';

    public $css = [
        'styles.css',
    ];

    public $js = [
        'editor.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
