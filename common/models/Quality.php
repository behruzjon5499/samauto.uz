<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quality".
 *
 * @property int $id
 * @property string $title
 * @property string $value
 */
class Quality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru','title_uz','title_en', 'value_ru', 'value_uz', 'value_en'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Название RU',
            'title_uz' => 'Название UZ',
            'title_en' => 'Название EN',
            'value_ru' => 'Значение RU',
            'value_uz' => 'Значение UZ',
            'value_en' => 'Значение EN',
        ];
    }
}
