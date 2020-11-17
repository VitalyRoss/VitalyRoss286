<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use app\models\WatchType;
use app\models\WatchOs;
use app\models\WatchCharging;
use app\models\Brand;

/* @var $this yii\web\View */
/* @var $model app\models\Watch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="watch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Название']) ?>

    <?= $form->field($uploadImg, 'img')->fileInput(['value' => $model->img]) ?>

    <?= $form->field($model, 'type_id')->dropdownList(
        array('empty'=>'Выберите тип...', '' =>
        WatchType::find()
            ->select(['title', 'id'])->indexBy('id')->column())); ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'placeholder' => 'Описание', 'rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['placeholder' => '1000']) ?>

    <?= $form->field($model, 'brand_id')->dropdownList(
        array('empty'=>'Выберите бренд...', '' =>
        Brand::find()
            ->select(['title', 'id'])->indexBy('id')->column())); ?>

    <?= $form->field($model, 'charging_id')->dropdownList(
            array('empty'=>'Выберите тип зарядки...', '' =>
            WatchCharging::find()
                ->select(['title', 'id'])->indexBy('id')->column())); ?>
    
    <?= $form->field($model, 'system_id')->dropdownList(
            array('empty'=>'Выберите поддержваемую систему...', '' =>
            WatchOs::find()
                ->select(['title', 'id'])->indexBy('id')->column())); ?>
    
    <?php Modal::begin([
        'header' => '<h2>Функционал</h2>',
        'toggleButton' => ['label' => 'Настроить дополнительные функции', 'class' => 'btn btn-info'],
        'options' => ['style' => 'color:black;']
    ]); 

    ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

        
    


    <?= $form->field($model, 'pulse')->dropDownList([
    '0' => 'Нет',
    '1' => 'Есть']); ?>

    <?= $form->field($model, 'nfc')->dropDownList([
    '0' => 'Нет',
    '1' => 'Есть']); ?>

    <?= $form->field($model, 'mic')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>

    <?= $form->field($model, 'display')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>

    <?= $form->field($model, 'calories')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>

    <?= $form->field($model, 'sleep')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>

    <?= $form->field($model, 'moisture')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>

    <?= $form->field($model, 'weather')->dropDownList([
        '0' => 'Нет',
        '1' => 'Есть']); ?>



    <?php Modal::end(); ?>

    <div class="form-group" style="margin-top:10px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
