<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
 
class CommentForm extends Model{
    
    public $text;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'watch_id', 'text'], 'required'],
            [['user_id', 'watch_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_id' => 'Watch ID',
            'text' => 'Текст комментария',
            'date' => 'Дата комментария',
        ];
    }

    public function save($watch_id)
    {
        $comment = new Comment();
        $comment->watch_id = $watch_id;
        $comment->user_id = Yii::$app->user->identity->id;
        $comment->date = date("Y-m-d H:i:s");
        $comment->text = $this->text;
        return $comment->save();
    }
    
}