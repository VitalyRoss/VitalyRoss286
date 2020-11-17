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
            <h1 style="font-size: 30px">Добро пожаловать в панель администратора, <br> <?= Yii::$app->user->identity->first_name ?>!</h1>
        <?php } ?>

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