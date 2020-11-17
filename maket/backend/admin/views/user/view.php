<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->first_name.' '.$model->last_name ;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данного пользтвателя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            // 'password',
            'first_name',
            'last_name',
            [
                'attribute' => 'role_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $active = $model->role_id;
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
                            'style' => 'font-size:14px;'
                        ]

                    );
                }
            ],
        ],
    ]) ?>

</div>
