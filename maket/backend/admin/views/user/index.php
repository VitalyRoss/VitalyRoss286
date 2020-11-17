<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('+ Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            // 'password',
            'first_name',
            'last_name',
            [
                
                'attribute' => 'role_id',
                
                'format' => 'raw',
                'options' => ['style' => 'width:10%'],
                'label' => 'Роль',
                'filter' => [
                    1 => 'Администратор',
                    2 => 'Модератор',
                    3 => 'Пользователь',
                ],
                'value' => function ($model, $key, $index, $column) {
                    $active = $model->{$column->attribute};
                    if($active == 1) {
                        $tag = 'Администартор';
                        $tag_color = 'info';
                    } elseif ($active == 2) {
                        $tag = 'Модератор';
                        $tag_color = 'warning';
                    } elseif ($active == 3) {
                        $tag = 'Пользователь';
                        $tag_color = 'success';
                    }

                    return \yii\helpers\Html::tag(
                        'span',
                        $tag,
                        
                        [
                            'class' => 'label label-' . $tag_color,
                        ]

                    );
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
