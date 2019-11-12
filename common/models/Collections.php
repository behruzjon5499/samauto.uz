<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collections".
 *
 * @property int $id
 * @property string $title
 */
class Collections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru','title_uz','title_en'], 'string', 'max' => 128],
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
        ];
    }
}
