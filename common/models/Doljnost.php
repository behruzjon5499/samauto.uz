<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doljnost".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_uz
 * @property string $name_en
 */
class Doljnost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doljnost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_uz', 'name_en'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Ф.И.О Ru',
            'name_uz' => 'Ф.И.О Uz',
            'name_en' => 'Ф.И.О En',
        ];
    }
}
