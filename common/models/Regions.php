<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property string $id
 * @property string $name
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru','name_uz','name_en'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название RU',
            'name_uz' => 'Название UZ',
            'name_en' => 'Название EN',
        ];
    }
}
