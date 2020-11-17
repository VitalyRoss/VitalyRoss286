<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\WatchType;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Часы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('+ Добавить', ['create'], ['class' => 'btn',  'style' => 'background: #800080;']) ?>
    </p>
    <?= Html::a('Настроить бренды', ['brand/index'], ['class' => 'btn', 'style' => 'background: #C71585']) ?>
    <?= Html::a('Настроить типы', ['watch-type/index'], ['class' => 'btn', 'style' => 'background: #FF1493']) ?>
    <?= Html::a('Настроить типы зарядки', ['watch-charging/index'], ['class' => 'btn', 'style' => 'background: #FF69B4']) ?>
    <?= Html::a('Настроить поддерживаемые системы', ['watch-os/index'], ['class' => 'btn', 'style' => 'background: #FFB6C1']) ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute('/web/img/watch/'.$data->img),[
                        'style' => 'width:100px;'
                    ]);
                },
            ],
            'description',
            
            [
                'attribute' => 'type_id',
                'filter' => ArrayHelper::map(WatchType::find()->all(), 'id', 'title'),
                'filterInputOptions' => ['class' => 'form-control form-control-sm'],
                'value' => 'type.title',
            ],

            // 'price',
            //'pulse',
            //'nfc',
            //'charging_id',
            //'system_id',
            //'mic',
            //'display',
            //'calories',
            //'sleep',
            //'moisture',
            //'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>