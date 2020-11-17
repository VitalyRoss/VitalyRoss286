<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property int $id
 * @property int $user_id
 * @property int $watch_id
 *
 * @property User $user
 * @property Watch $watch
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'watch_id'], 'required'],
            [['user_id', 'watch_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['watch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Watch::className(), 'targetAttribute' => ['watch_id' => 'id']],
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
            'watch_id' => 'Watch ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Watch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatch()
    {
        return $this->hasOne(Watch::className(), ['id' => 'watch_id']);
    }

}
