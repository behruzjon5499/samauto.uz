<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calls".
 *
 * @property integer $id
 * @property integer $date
 * @property string $phone
 * @property integer $status
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'status'], 'integer'],
            [['phone'], 'string', 'max' => 21],
            [['name'], 'string', 'max' => 23]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'phone' => 'Телефон',
            'name' => 'Имя',
            'status' => 'Статус',
        ];
    }
}
