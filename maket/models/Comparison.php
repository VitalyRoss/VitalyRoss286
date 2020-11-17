<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comparison".
 *
 * @property int $id
 * @property int $watch_id
 * @property int $user_id
 *
 * @property User $user
 * @property Watch $watch
 */
class Comparison extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comparison';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['watch_id', 'user_id'], 'required'],
            [['watch_id', 'user_id'], 'integer'],
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
            'watch_id' => 'Watch ID',
            'user_id' => 'User ID',
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
