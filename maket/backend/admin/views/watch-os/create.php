<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WatchType */

$this->title = 'Добавить новый элемент';
$this->params['breadcrumbs'][] = ['label' => 'Системы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watch-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
