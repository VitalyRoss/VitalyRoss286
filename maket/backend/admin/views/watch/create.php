<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Watch */

$this->title = 'Добавить часы';
$this->params['breadcrumbs'][] = ['label' => 'Часы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadImg' => $uploadImg
    ]) ?>

</div>
