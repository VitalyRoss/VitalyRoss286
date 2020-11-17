<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Watch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Watches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="watch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данный элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function($data)
                {
                    return Html::img(Url::toRoute('/web/img/watch/'.$data->img),[
                        'style' => 'width:250px;'
                    ]);
                }
            ],
            'description',
            // 'price',

            [
                'attribute' => 'brand.title',
                'label' => 'Бренд'
            ],

            [
                'attribute' => 'type.title',
                'label' => 'Тип'
            ],
            [
                'attribute' => 'charging.title',
                'label' => 'Тип зарядки'
            ],
            [
                'attribute' => 'system.title',
                'label' => 'Поддерживаемая система'
            ],

            [
                'attribute' => 'date',
                'format' => ['date']
            ],
            [
                'attribute' => 'moisture',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->moisture;
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
                'attribute' => 'pulse',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->pulse;
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
                'attribute' => 'nfc',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->nfc;
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
                'attribute' => 'mic',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->mic;
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
                'attribute' => 'display',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->display;
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
                'attribute' => 'calories',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->calories;
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
                'attribute' => 'sleep',
                'format' => 'raw',
                'value' => function($model){
                    $active = $model->sleep;
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
            ]


        ],
    ]) ?>

</div>
