<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Фитнес-трекеры</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Фитнес-трекеры',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Каталог!', 'url' => ['/catalog/index']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Регистрация', 'url' => ['/site/sign-up']]
            ) : '',
            Yii::$app->user->identity->role->isAdmin ? (
                ['label' => 'Панель Администратора', 'url' => ['/../admin/default/index']]
            ) : '',
            Yii::$app->user->identity->role->isModerator ? (
                ['label' => 'Панель Модератора', 'url' => ['/../moderator/default/index']]
            ) : '',
            // избранное
            Yii::$app->user->isGuest ? '' : (
                    [
                        'label' => '<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>', 
                        'url' => ['/profile/wishlist'],
                        'options' => ['title' => 'Избранное']
                    ]
            ),

            // список сравнения
            Yii::$app->user->isGuest ? '' : (
                [
                    'label' => '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>', 
                    'url' => ['/profile/comparison'],
                    'options' => ['title' => 'Список сравнения']
                ]
        ),

            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Виталий Россь <?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
