<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phone_calls".
 *
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property int $phone_number
 */
class PhoneCalls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_calls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'full_name', 'phone_number'], 'required'],
            [['user_id', 'phone_number'], 'integer'],
            [['full_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
            'phone_number' => 'Phone Number',
        ];
    }
}
