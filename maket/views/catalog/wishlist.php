<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Избранное';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    </div>

    <div class="body-content">


    <div class="row"> 

        <?php 

            foreach ($wishes as $wish) {

        ?>
            <a href="#">
            <div  class="col-lg-4" 
                style = "
                background: no-repeat url('/web/img/watch/<?=$wish->img?>'); 
                padding: 20px; 
                padding-top: 200px; 
                text-align: center; 
                border-radius: 50px;
                background-size: cover;
                margin-left: 100px;">

            </a>

                <div class="watch-description">
                    <h4><b><?= $wish->title ?></b></h4>

                    <p><?= $wish->description ?></p>

                    <p><a class="btn" style="border: 2px solid white; color:white;" href="view?id=<?= $wish->id ?>"><b>Просмотр</b></a></p>
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