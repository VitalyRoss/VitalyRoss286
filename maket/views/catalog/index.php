<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\Wishlist;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if(Yii::$app->user->isGuest)
    { ?>
    
        <p> Зарегистрированные пользователи могут добавить предметы к сравнению или в избранное </p>

    <?php } ?>

        
    <?php
        if(isset($urlEnd)) 
        { 
            echo '<h5 style="text-shadow: white 0 0 10px;"><strong>';
            switch($urlEnd)
            {
                case('for-running'): echo 'Для бега важны такие параметры, как подсчёт калорий, <br> микрофон (чтобы телефон не мешал), измерение пульса. <br> Мы отобрали для вас подобные варинаты.'; break;
                case('for-swimming'): echo 'Для плавания, прежде всего, важна влагостойкость. <br> Не будут лишними пульсометр и подсчёт калорий. <br> Мы отобрали варианты для вас.'; break;
                case('for-daily'): echo 'Частые изменения погоды, нездоровый сон и вечное недосыпание. <br> Мониторинг фаз сна, просмотр погода, поддержка nfc и зарядка type-c, <br> чтобы не было много лишних проводов, освободят <br> вашу голову от излишней головной боли! <br> Мы отобрали для вас варинаты.'; break;
                default: '';
            }
            echo '</strong></h5>';
        }
        ?>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'firstPageLabel' => 'Начало',
            'lastPageLabel' => 'Конец',
        ],
        'layout' => '{summary}{items}{pager}',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'summary' => 'Показаны фитнес-трекеры <strong>{begin}-{end}</strong> из <strong>{totalCount}</strong>.',
        'headerRowOptions' => ['style' => 'background: url(/web/img/r4_blur_7.jpg)'],
        'rowOptions' => function ($model, $key, $index, $grid)
        {
              return ['style' => 'background: url(/web/img/r4_blur.jpg); color:white; font-weight:bold'];
        },
        // 'filterModel' => $searchModel,
        'columns' => [


            [
                'label' => '',
                'format' => 'raw',
                'options' => ['style' => 'width:300px;'],
                'value' => function($data){
                    return Html::img(Url::toRoute('/web/img/watch/'.$data->img),[
                        'style' => 'width:250px;'
                    ]);
                },
            ],
            [
                'label' => '',
                'format' => 'raw',
                // 'options' => ['style' => 'width:300px;'],
                'value' => function($data){
                    return '
                    <h4 style="text-align:center; color:white"><b>'.$data->title.'</b></h4>

                    <p style="text-align:center; color:white">'.$data->description.'</p>

                    <p style="text-align:center;">
                    <a class="btn" style="border: 2px solid white; color:white;" href="view?id='. $data->id .'">
                    <b>Просмотр</b></a></p>';
                },
            ],

            [
                'attribute' => 'date',
                'format' => 'date',
                'options' => ['width' => '30px']
            ],

            [
                'label' => 'Средняя цена',
                'options' => ['style' => 'width:50px;'],
                'attribute' => 'price',
                'value' => function($model)
                {
                    return $model->price.' руб.';
                }
            ],

            // ДОБАВИТЬ В ИЗБРАННОЕ
            [
                'format' => 'raw',
                'options' => ['width' => '50px'],
                'value' => function($data) {
                    if(!Yii::$app->user->isGuest)
                    {
                        Pjax::begin(['timeout' => 5000 ]);
                        // ссылка на модель Watch
                        // если у пользователя предмет не в избранном, то заполнить сердечко
                        // если нет - вывести кнопку
                        if($data->wishlist($data->id) == null)
                        {
                            return Html::a('♡+', ['catalog/index','id' => $data->id],
                            [
                                'class' => 'btn btn-danger',
                                'title' => "Добавить в избранное"
                            ]);
                        }
                        else
                        {
                            return '<p style="color:red; font-size: 20px;" title="В избранном">❤</p>';
                            Pjax::end();
                        }
                    }
                }
            ],

            // ДОБАВИТЬ В ИЗБРАННОЕ
            [
                'format' => 'raw',
                'options' => ['width' => '50px'],
                'value' => function($data) {
                    if(!Yii::$app->user->isGuest)
                    {
                        Pjax::begin(['timeout' => 5000 ]);
                        if($data->comparison($data->id) == null)
                        {
                            return Html::a('☰+', ['catalog/add-to-comparison','id' => $data->id],
                            [
                                'class' => 'btn btn-info',
                                'title' => "Добавить к сравнению"
                            ]);
                        }
                        else
                        {
                            return '<p style="font-size: 20px;" title="Добавлено к сравнению">✔</p>';
                            Pjax::end();
                        }
                    }
                }
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

a {
    color: pink;
}

</style>