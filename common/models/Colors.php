<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property int $id
 * @property string $title
 * @property string $value
 * @property string $code
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru','title_uz','title_en', 'value'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 6],
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
            'value' => 'Значение',
            'code' => 'Код',
        ];
    }
}
