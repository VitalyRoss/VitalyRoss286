<?php

namespace app\models;

use yii\data\Pagination;
use Yii;

/**
 * This is the model class for table "watch".
 *
 * @property int $id
 * @property string $title название часов
 * @property string $img изображение
 * @property string $description описание
 * @property int $price цена
 * @property int|null $pulse функция измерения пульса
 * @property int|null $nfc функция NFC
 * @property int|null $brand_id брэнд (связь с таблицей)
 * @property int|null $charging_id тип зарядки (связь с таблицей)
 * @property int|null $system_id совместимая система
 * @property int|null $mic наличие микрофона
 * @property int|null $display наличие дисплея
 * @property int $type_id тип (часы или браслет)
 * @property int|null $calories мониторинг калорий
 * @property int|null $sleep мониторинг сна
 * @property int|null $moisture влагозащита
 * @property int|null $weather погода
 * @property string|null $date дата выхода
 *
 * @property WatchType $type
 * @property WatchCharging $charging
 * @property WatchOs $system
 * @property Brand $brand
 */
class Watch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'watch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'img', 'description', 'price', 'type_id'], 'required'],
            [['price', 'pulse', 'nfc', 'brand_id', 'charging_id', 'system_id', 'mic', 'display', 'type_id', 'calories', 'sleep', 'moisture', 'weather'], 'integer'],
            [['date'], 'safe'],
            [['title', 'img', 'description'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WatchType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['charging_id'], 'exist', 'skipOnError' => true, 'targetClass' => WatchCharging::className(), 'targetAttribute' => ['charging_id' => 'id']],
            [['system_id'], 'exist', 'skipOnError' => true, 'targetClass' => WatchOs::className(), 'targetAttribute' => ['system_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Модель',
            'img' => 'Изображение',
            'description' => 'Описание',
            'price' => 'Цена',
            'pulse' => 'Функция измерения пульса',
            'nfc' => 'Функция NFC',
            'brand_id' => 'Бренд',
            'charging_id' => 'Тип зарядки',
            'system_id' => 'Совместимая система',
            'mic' => 'Наличие микрофона',
            'display' => 'Наличие дисплея',
            'type_id' => 'Тип',
            'calories' => 'Мониторинг калорий',
            'sleep' => 'Мониторинг сна',
            'moisture' => 'Влагозащита',
            'weather' => 'Погода',
            'date' => 'Дата выхода',
        ];
    }

    /**
     * Возвращает все комментарии
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['watch_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(WatchType::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Charging]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharging()
    {
        return $this->hasOne(WatchCharging::className(), ['id' => 'charging_id']);
    }

    /**
     * Gets query for [[System]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSystem()
    {
        return $this->hasOne(WatchOs::className(), ['id' => 'system_id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Проверяет один предмет для одного пользователя для избранного
     *
     */
    public function wishlist($id)
    {
        return WishList::findOne(['user_id' => Yii::$app->user->identity->id, 'watch_id' => $id]);
    }
    
    /**
     * Проверяет один предмет для одного пользователя для сравнения
     *
     */
    public function comparison($id)
    {
        return Comparison::findOne(['user_id' => Yii::$app->user->identity->id, 'watch_id' => $id]);
    }
}
