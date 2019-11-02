<?php
use yii\web\View;
use widgets\xeditor\EditorAssets;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use widgets\xeditor\models\Image;
use widgets\palettecolors\PaletteColors;

$bundle = EditorAssets::register($this);

$this->registerCssFile("https://fonts.googleapis.com/css?family=Arvo&display=swap", [], 'font-arvo');
$this->registerCssFile("https://fonts.googleapis.com/css?family=Open+Sans&display=swap", [], 'font-open-sans');
?>

<?= Html::beginTag("div", [
    'id' => $id,
]) ?>

    <?= Html::beginTag("div", [
        'class' => 'mask',
    ]) ?>

        <?= Html::beginTag("div", [
            'class' => 'commands',
        ]) ?>
            <?php foreach($commands as $cmd): ?>
                <?= Html::img($bundle->baseUrl . '/images/'.$cmd['img'].'.png', [
                    'data-cmd' => $cmd['cmd'],
                    'data-val' => $cmd['val'],
                    'title' => array_key_exists('desc', $cmd) ? $cmd['desc'] : '',
                ]) ?>
            <?php endforeach; ?>

            <!-- format block list -->
            <?= Html::dropDownList('formatBlock', null, $itemsFormatBlock, [
                'class' => 'formatBlock',
            ]) ?>

            <!-- font name list -->
            <?= Html::img($bundle->baseUrl . '/images/font-name.png', [
                'title' => 'Font name',
            ]) ?>
            <?= Html::dropDownList('fontName', null, $itemsFontName, [
                'class' => 'fontName',
            ]) ?>

            <!-- font size list -->
            <?= Html::img($bundle->baseUrl . '/images/font-size.png', [
                'title' => 'Font size',
            ]) ?>
            <?= Html::dropDownList('fontSize', null, $itemsFontSize, [
                'class' => 'fontSize',
            ]) ?>
            <?= Html::img($bundle->baseUrl . '/images/increase-font-size.png', [
                'title' => 'Increase Font Size',
                'data-cmd' => 'increaseFontSize',
            ]) ?>
            <?= Html::img($bundle->baseUrl . '/images/decrease-font-size.png', [
                'title' => 'Decrease Font Size',
                'data-cmd' => 'decreaseFontSize',
            ]) ?>
            <!-- end font size list -->

            <!-- palette colors widget and back/fore color tools --> 
            <?= PaletteColors::widget() ?>
            <?= Html::img($bundle->baseUrl . '/images/back-color.png', [
                'title' => 'Back Color',
                'class' => 'back-color',
            ]) ?>
            <?= Html::img($bundle->baseUrl . '/images/fore-color.png', [
                'title' => 'Fore Color',
                'class' => 'fore-color',
            ]) ?>
            

        <?= Html::endTag("div") ?>

        <?= Html::tag("div", $model[$attribute], [
            "contenteditable" => true,
            "class" => 'editor',
        ]) ?>

    <?= Html::endTag("div") ?>

<?= Html::endTag("div") ?>
