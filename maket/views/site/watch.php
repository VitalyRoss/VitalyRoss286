<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Часы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="category">
            <div class="col-lg-4 тщ" style="background:url('/web/img/activities/run.jpg');">
                <h2>Бег</h2>

            </div>
            <div class="col-lg-4" style="background:url('/web/img/activities/swim.jpg')">
                <h2>Плавание</h2>


            </div>
            <div class="col-lg-4" style="background:url('/web/img/activities/povsednevnaya.jpg');">
                <h2>Повседневная жизнь</h2>

                </div>
            </div>
        </div>

    </div>

    <p>
        <!-- <br>Найдите часы себе по вкусу! Зарегистрированные пользователи могут добавить к сравнению или в список желаемого. -->
        <br>
    </p>


    <div class="body-content">

    <!-- Search form -->
    <!-- <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
    <i class="fas fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
        aria-label="Search">
    </form> -->

    <!-- ПОИСК -->
    <?php require_once('../views/widgets/search.php') ?>


    <div class="row"> 

        <?php 

            foreach ($watches as $watch) {

        ?>
            <a href="#">
            <div  class="col-lg-4" 
                style = "
                background: no-repeat url('/web/img/watch/<?=$watch->img?>'); 
                padding: 20px; 
                padding-top: 200px; 
                text-align: center; 
                border-radius: 50px;
                background-size: cover;
                margin-left: 100px;">

            </a>

                <div class="watch-description">
                    <h4><b><?= $watch->title ?></b></h4>

                    <p><?= $watch->description ?></p>

                    <p><a class="btn" style="border: 2px solid white; color:white;" href="view?id=<?= $watch->id ?>"><b>Просмотр</b></a></p>
                </div>

            </div>

        
        
        
            <?php } ?>

        </div>


</div>


<style>

@media screen and (max-width: 1152px) {


    .col-lg-4 {
        margin-left: 0px !important;
    }

    .col-lg-4:hover {
        width: 33%;
    }
}

    .col-lg-4:hover {
        width: 500px;
    }

    .category .col-lg-4:hover {
        width: 33%;
        
    }

    .category .col-lg-4 {
        color: black;
        text-shadow: black 1px 1px 0, black 2px 2px 0, 
                 white 3px 3px 0, white 4px 4px 0, 
                 black 5px 5px 0;
        
    }
    
    
</style>