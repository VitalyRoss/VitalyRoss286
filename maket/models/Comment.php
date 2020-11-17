<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property string $date дата комментария
 *
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

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

    /**
     * Возвращает автора
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Возвращает часы
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatch()
    {
        return $this->hasOne(Watch::className(), ['id' => 'watch_id']);
    }

}
