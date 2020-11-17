<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- Выводит имя пользователя, если он авторизован. -->

    <div class="jumbotron">
        <?php 
        if(!Yii::$app->user->identity->id) { ?>
            <h1>Добро пожаловать!</h1>
        <?php 
        } else {
        ?>
            <h1 style="font-size: 60px">Добро пожаловать, <?= Yii::$app->user->identity->first_name ?>!</h1>
        <?php } ?>

        <p class="lead">Наше приложение поможет вам подобрать свой фитнес-трекер.</p>

        <p><a class="btn btn-lg btn-success" href="/catalog/index">Начнём?</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4" style="background:url('/web/img/activities/run.jpg');">
                <h2>Для бега</h2>
                <p>Для бега, в первую очередь, <br> важнее всего подсчёт калорий <br>  и измерение пульса</p>

                <p><a class="btn btn-default" href="/catalog/for-running">Подобрать</a></p>
            </div>
            <div class="col-lg-4" style="background:url('/web/img/activities/swim.jpg')">
                <h2>Для плавания</h2>

                <p>Для плавания <br> чрезвычайно важна <br> влагостойкость </p>

                <p><a class="btn btn-default" href="/catalog/for-swimming">Подобрать</a></p>
            </div>
            <div class="col-lg-4" style="background:url('/web/img/activities/povsednevnaya.jpg'); background-size: contain">
                <h2>Для повседневной жизни</h2>

                <p>Просмотр погоды,<br> поддержка nfc, <br> мониторинг сна </p>

                <p><a class="btn btn-default" href="/catalog/for-daily">Подобрать</a></p>
            </div>
        </div>

    </div>
</div>


<style>
.col-lg-4
{
    color: black;
    filter: brightness(70%);
    height: 200px;
}

h2
{
    text-shadow: black 1px 1px 0, black 2px 2px 0, 
                 white 3px 3px 0, white 4px 4px 0, 
                 black 5px 5px 0;
}

.col-lg-4 p
{
    color: white;
    font-weight: bold;
    text-shadow: black 0 0 10px;
    
}
</style>