<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $date дата создания
 * @property int $status 0-не прочитано 1-прочитано
 * @property string $msg сообщение 1Кб
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'date', 'status'], 'integer'],
            [['msg'], 'required'],
            [['msg'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'product_id' => 'Товар',
            'date' => 'Дата',
            'status' => 'Статус',
            'msg' => 'Сообщение',
        ];

    }
}
