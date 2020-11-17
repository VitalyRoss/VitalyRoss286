

<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;


Modal::begin([
        'header' => '<h2>Комментарии</h2>'.
                ((Yii::$app->user->isGuest) ? 'Только зарегистрированные пользователи могут оставлять комментарии' : ''),
        'toggleButton' => ['label' => 'Коментарии', 'class' => 'btn btn-default btn-lg btn-block', 'style' => "filter:opacity(70%)"],
        'options' => ['style' => 'color:black;']
    ]); 


if($comments != null)
{
    foreach($comments as $comment)
    {   
        echo '<h4><b>'.$comment->author->first_name.'</b></h4>';
        echo '<p style="font-size:12px;"><i>'.$comment->date.'</i></p>';
        echo '<p style="font-size:15px;">'.$comment->text.'</p>';
        echo '<br>';
    }
}

if(!Yii::$app->user->isGuest)
{
    $form = ActiveForm::begin();

    echo $form->field($commentForm, 'text')->textarea(['maxlength' => true, 'placeholder' => 'Текст комментария']);

    echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-default btn-lg btn-block', 'style' => "filter:opacity(70%)"]);

    ActiveForm::end();
}  
    
    
?>



<?php Modal::end(); ?>