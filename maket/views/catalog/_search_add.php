

<?php

use yii\bootstrap\Modal;
use app\models\WatchCharging;
use app\models\WatchOs;

Modal::begin([
        'header' => '<h2>Дополнительно</h2> Настройте дополнительные фильтры, если необходимо:',
        'toggleButton' => ['label' => 'Настроить дополнительные фильтры', 'class' => 'btn btn-info'],
        'options' => ['style' => 'color:black;']
    ]); ?>

    <?= $form->field($model, 'system_id')->dropdownList(WatchOs::find()
        ->select(['title', 'id'])->indexBy('id')->column(), ['prompt'=>'Неважно']); ?>

    <?= $form->field($model, 'charging_id')->dropdownList(WatchCharging::find()
        ->select(['title', 'id'])->indexBy('id')->column(), ['prompt'=>'Неважно']); ?>

    <?= $form->field($model, 'pulse')
    ->dropDownList([
        '0' => 'Нет',
        '1' => 'Да',
    ],
    [
        'prompt' => 'Неважно'
    ]); ?>

    <?= $form->field($model, 'nfc')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>



    <?= $form->field($model, 'display')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>


    <?= $form->field($model, 'mic')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>

    <?= $form->field($model, 'calories')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>

    <?= $form->field($model, 'sleep')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>

    <?= $form->field($model, 'moisture')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>


    <?= $form->field($model, 'weather')
        ->dropDownList([
            '0' => 'Нет',
            '1' => 'Да',
        ],
        [
            'prompt' => 'Неважно'
        ]); ?>

    <?php Modal::end(); ?>