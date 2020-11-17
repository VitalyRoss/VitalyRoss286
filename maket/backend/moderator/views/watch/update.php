<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Watch */

$this->title = 'Update Watch: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Watches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="watch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadImg' => $uploadImg
        ]) ?>

</div>
