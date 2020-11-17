<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "user_role".
 *
 * @property int $id
 * @property int $isModerator права модератора
 * @property int $isAdmin права администратора
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isModerator', 'isAdmin'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isModerator' => 'права модератора',
            'isAdmin' => 'права администратора',
        ];
    }

    /**
     * Связь с таблицей пользвоателя
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['role_id' => 'id']);
    }
}
