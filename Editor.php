<?php

namespace widgets\xeditor;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class Editor extends InputWidget {

    public $type;
    public $model;
    public $attribute;
    public $options;

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['widgets/htmleditor/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => 'widgets/htmleditor/messages',
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('widgets/htmleditor/messages/' . $category, $message, $params, $language);
    }

    public function run()
    {
        $id = $this->getId();

        if ($this->hasModel())
            echo Html::activeHiddenInput($this->model, $this->attribute, array_merge($this->options, [
                "id" => $id . '-text-editor',
            ]));
        else
            echo Html::hiddenInput($this->attribute, '', array_merge($this->options, [
                "id" => $id . '-text-editor',
            ]));

        $commands = [
            [
                'cmd'=>'undo',
                'img'=>'arrow-undo',
                'desc'=>$this->t('message', 'Undo'),
                'val'=>'',
            ],
            [
                'cmd'=>'redo',
                'img'=>'arrow-redo',
                'desc'=>'Redo',
                'val'=>'',
            ],
            [
                'cmd'=>'selectAll',
                'img'=>'select-all',
                'val'=>'',
            ],
            [
                'cmd'=>'copy',
                'img'=>'copy',
                'val'=>'',
            ],
            [
                'cmd'=>'paste',
                'img'=>'paste',
                'val'=>'',
            ],
            [
                'cmd'=>'bold',
                'img'=>'bold',
                'val'=>'',
            ],
            [
                'cmd'=>'italic',
                'img'=>'italic',
                'val'=>'',
            ],
            [
                'cmd'=>'underline',
                'img'=>'underline',
                'val'=>'',
            ],
            [
                'cmd'=>'strikeThrough',
                'img'=>'strikethroungh',
                'val'=>'',
            ],
            [
                'cmd'=>'justifyLeft',
                'img'=>'align-left',
                'val'=>'',
            ],
            [
                'cmd'=>'justifyCenter',
                'img'=>'align-center',
                'val'=>'',
            ],
            [
                'cmd'=>'justifyRight',
                'img'=>'align-right',
                'val'=>'',
            ],
            [
                'cmd'=>'justifyFull',
                'img'=>'align-justity',
                'val'=>'',
            ],
            [
                'cmd'=>'insertUnorderedList',
                'img'=>'list-bullets',
                'val'=>'',
            ],
            [
                'cmd'=>'insertOrderedList',
                'img'=>'list-numbers',
                'val'=>'',
            ],            
            [
                'cmd'=>'superscript',
                'img'=>'superscript',
                'val'=>'',
            ],
            [
                'cmd'=>'subscript',
                'img'=>'subscript',
                'val'=>'',
            ],
        ];

        return $this->render('index', [
            'id' => $id,
            'commands' => $commands,
            'model' => $this->hasModel() ? $this->model : "",
            'attribute' => $this->attribute,
            'itemsFormatBlock' => [
                '' => $this->t('message', 'Normal'),
                'h1' => $this->t('message', 'Heading 1'),
                'h2' => $this->t('message', 'Heading 2'),
                'h3' => $this->t('message', 'Heading 3'),
                'h4' => $this->t('message', 'Heading 4'),
                'h5' => $this->t('message', 'Heading 5'),
                'h6' => $this->t('message', 'Heading 6'),
                'address' => $this->t('message', 'Address'),
                'pre' => $this->t('message', 'Preparagraph'),
            ],
            'itemsFontName' => [
                'Arial' => 'Arial',
                'Tahoma' => 'Tahoma',
                'Times New Roman' => 'Times New Roman',
                'Georgia' => 'Georgia',
                'Arvo' => 'Arvo',
                'Open Sans' => 'Open Sans',
            ],
            'itemsFontSize' => [
                1 => 1,
                2, 3, 4, 5, 6, 7
            ],
        ]);
    }

}
