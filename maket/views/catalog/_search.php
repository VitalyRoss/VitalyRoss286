<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Brand;
use app\models\WatchType;

/* @var $this yii\web\View */
/* @var $model app\models\WatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="watch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?= $form->field($model, 'title')->textInput(['style' => 'width:40%', 'placeholder' => 'Поиск по названию...'])->label('Поиск') ?>


    <!-- <?= $form->field($model, 'description')->textInput(['placeholder' => 'Поиск по описанию...' ]) ?> -->

    <!-- <?= $form->field($model, 'price') ?> -->

    <table>
    <tr>
    <td style = "width: 30%">
    <?= $form->field($model, 'brand_id')->dropdownList(Brand::find()
        ->select(['title', 'id'])->indexBy('id')->column(), ['prompt'=>'Неважно']); ?>
    </td>
    <td style = 'width: 30%; padding-left: 10px;'>
    <?= $form->field($model, 'type_id')->dropdownList(WatchType::find()
        ->select(['title', 'id'])->indexBy('id')->column(), ['prompt'=>'Неважно']); ?>
    </td>
    </tr>
    </table>

    <?php require_once('_search_add.php') ?>

    <?php // echo $form->field($model, 'system_id') ?>

    <?php // echo $form->field($model, 'date') ?>


        
        
    <div class="form-group" style="margin-top: 10px;">
        <?= Html::submitButton('Поиск', ['class' => 'btn', 'style' => 'background: #FF69B4;']) ?>
        <?= Html::a('Сброс', ['index'], ['class' => 'btn btn-default', 'style' => 'filter:opacity(65%)']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>

table label {
    color: white;
} 

</style>