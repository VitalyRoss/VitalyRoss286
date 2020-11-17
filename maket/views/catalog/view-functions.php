<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\helpers\Url;

echo '<div class="detail-view">'.DetailView::widget([
    'model' => $model,
    'attributes' => [
        // 'id',
        // 'price',

        [
            'attribute' => 'brand.title',
            'label' => 'Бренд'
        ],

        [
            'label' => 'Средняя цена',
            'attribute' => 'price',
            'value' => function($model)
            {
                return $model->price.' руб.';
            }
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