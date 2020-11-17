<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WishlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Избранное';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'summary' => 'Показаны фитнес-трекеры <strong>{begin}-{end}</strong> из <strong>{totalCount}</strong>.',
        'headerRowOptions' => ['style' => 'background: url(/web/img/r4.jpg); color: white;'],
        'rowOptions' => function ($model, $key, $index, $grid)
        {
              return ['style' => 'background: url(/web/img/r4_blur_7.jpg); color:white; font-weight:bold'];
        },
        'columns' => [


            [
                'label' => '',
                'format' => 'raw',
                'options' => ['style' => 'width:300px;'],
                'value' => function($data){
                    return Html::img(Url::toRoute('/web/img/watch/'.$data->watch->img),[
                        'style' => 'width:250px;'
                    ]);
                },
            ],
            [
                'label' => '',
                'format' => 'raw',
                'value' => function($data){
                    return '
                    <h4 style="text-align:center; color:white"><b>'.$data->watch->title.'</b></h4>

                    <p style="text-align:center; color:white">'.$data->watch->description.'</p>

                    <p style="text-align:center;">
                    <a class="btn" style="border: 2px solid white; color:white;" href="/catalog/view?id='. $data->watch->id .'">
                    <b>Просмотр</b></a></p>';
                },
            ],

            [
                'attribute' => 'watch.date',
                'format' => 'date',
                'options' => ['width' => '30px']
            ],

            [
                'label' => 'Средняя цена',
                'options' => ['style' => 'width:50px;'],
                'attribute' => 'price',
                'value' => function($model)
                {
                    return $model->watch->price.' руб.';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                            'confirm' => 'Удалить предмет из избранного?',
                            'method' => 'post',
                            ],
                        ]);

                        }
            ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


<style>

table {
    background: transparent;
    /* transform: rotate(90deg); */
}

table td {
    /* transform: rotate(270deg) */
}

table a {
    font-size: 20px;
    color: white;
}

table a:hover {
    color: white;
    text-shadow: white 0 0 10px;
}

</style>