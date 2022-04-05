<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $name
 * @property int|null $year
 * @property string|null $color
 * @property string|null $engine
 * @property int|null $engine_type_id
 * @property int|null $kpp_id
 * @property float|null $price
 * @property int|null $currency_id
 * @property int|null $isHave
 * @property int|null $status
 * @property string|null $photo
 * @property string|null $description
 *
 * @property Currencies $currency
 * @property EngineTypes $engineType
 * @property Kpps $kpp
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['year', 'engine_type_id', 'kpp_id', 'currency_id','status','isHave'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'color'], 'string', 'max' => 200],
            [['engine'], 'string', 'max' => 25],
            [['engine_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EngineTypes::className(), 'targetAttribute' => ['engine_type_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['kpp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kpps::className(), 'targetAttribute' => ['kpp_id' => 'id']],
            [['photo'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Модель',
            'year' => 'Год',
            'color' => 'Цвет',
            'engine' => 'Объем двигателя',
            'engine_type_id' => 'Тип двигателя',
            'kpp_id' => 'КПП',
            'price' => 'Цена',
            'currency_id' => 'Валюта',
            'isHave' => 'Есть в наличии',
            'photo' => 'Фото',
            'status' => 'Статус',
            'created_at' => 'Дата и время создания',
            'updated_at' => 'Дата и время обновления',
            'created_by' => 'Создал',
            'updated_by' => 'Обновил',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currencies::className(), ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[EngineType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngineType()
    {
        return $this->hasOne(EngineTypes::className(), ['id' => 'engine_type_id']);
    }

    /**
     * Gets query for [[Kpp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKpp()
    {
        return $this->hasOne(Kpps::className(), ['id' => 'kpp_id']);
    }
}
