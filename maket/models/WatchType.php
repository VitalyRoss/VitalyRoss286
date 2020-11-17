<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "watch_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property Watch[] $watches
 */
class WatchType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'watch_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }

    /**
     * Gets query for [[Watches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatches()
    {
        return $this->hasMany(Watch::className(), ['type_id' => 'id']);
    }
}
