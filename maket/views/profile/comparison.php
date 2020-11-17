<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WishlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сравнение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-index">


    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        // 'headerRowOptions' => ['style' => 'background: url(/web/img/r4.jpg); color: white;'],
        // 'rowOptions' => function ($model, $key, $index, $grid)
        // {
        //       return ['style' => 'background: url(/web/img/r4_blur_7.jpg); color:white; font-weight:bold'];
        // },
        'columns' => [


            'watch.title',
            [
                'label' => '',
                'format' => 'raw',
                // 'options' => ['style' => 'width:300px;'],
                'value' => function($data){
                    return Html::img(Url::toRoute('/web/img/watch/'.$data->watch->img),[
                        'style' => 'width:100px;'
                    ]);
                },
            ],
            // [
            //     'label' => '',
            //     'format' => 'raw',
            //     'value' => function($data){

            //         return '
            //         <p style="text-align:center;">
            //         <a class="btn" style="border: 2px solid black;" href="view?id='. $data->watch->id .'">
            //         <b>Просмотр</b></a></p>';
            //     },
            // ],

            [
                'attribute' => 'watch.date',
                'format' => 'date',
            ],

            [
                'label' => 'ОС',
                'attribute' => 'watch.system.title'
            ],

            [
                'label' => 'Тип зарядки',
                'attribute' => 'watch.charging.title'
            ],

            [
                'label' => 'Средняя цена',
                'attribute' => 'watch.price',
                'value' => function($model)
                {
                    return $model->watch->price.' руб.';
                }
            ],

            [
                'label' => 'Влагозащита',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->moisture;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],
            
            [
                'label' => 'Пульс',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->pulse;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],

            [
                'label' => 'NFC',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->nfc;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],

            [
                'label' => 'Микрофон',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->mic;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],

            [
                'label' => 'Дисплей',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->display;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],

            [
                'label' => 'Калории',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->calories;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
                }   
            ],

            [
                'label' => 'Фазы сна',
                'format' => 'raw',
                'value' => function($model)
                {
                    $active = $model->watch->sleep;
                    if($active == 1) {
                        $tag = 'Да';
                        $tag_color = 'success';
                    } elseif ($active == 0) {
                        $tag = "Нет";
                        $tag_color = 'danger';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,

                        [
                            'class' => 'label label-' . $tag_color,
                            'style' => 'font-size:14px;'
                        ]

                    );
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
                            'confirm' => 'Удалить предмет из сравнения?',
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
    background: white;
}

table a {
    font-size: 20px;
    color: black;
}

table a:hover {
    color: black;
    text-shadow: black 0 0 10px;
}

</style>