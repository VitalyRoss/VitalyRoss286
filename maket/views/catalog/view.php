<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $model->title;
?>
<div class="site-error">


    <div class="jumbotron" style="background: white">

        <table>
            <tr>
                <td><img src="/web/img/watch/<?=$model->img?>" width="400px" style="margin-top: -70%"></td>
                <td style="text-align: left; padding-left: 90px;">
                    <div class="watch" style="
                    padding: 25px; 
                    border-radius: 25px;
                    background-size: 30px;
                    text-shadow: black 1px 1px 0, black 2px 2px 0, 
                    black 3px 3px 0, black 4px 4px 0, 
                    black 5px 5px 0;
                    color: white;
                    ">

                    <h1><?=$model->title ?></h1>

                    <p class="lead"><?= $model->description?></p>

                    <!-- <p><a class="btn btn-lg btn-success" style="background: #222222; border: 2px solid transparent;" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
                    
                    <?php require_once('view-functions.php'); ?>

                    </div>
                </td>
            </tr>
        </table>
    </div>
    <!-- <a style="filter:opacity(70%)" type="button" class="btn btn-default btn-lg btn-block">Комментарии</a> -->
    
    <?php require_once('comments.php'); ?>

</div>

<style>
    .watch:hover {
        background-size: 3px;
    }

    .detail-view {
        text-shadow: none;
        color: black;
    }
</style>