<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $date
 * @property int $user_id от
 * @property string $text
 * @property int $type 0 из просмотра товара
 * @property int $status 0-выкл 1-активен 2-на модерации
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'user_id', 'type', 'status','product_id'], 'integer'],
            [['text'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата отправки',
            'user_id' => 'Пользователь',
            'product_id' => 'Товар',
            'text' => 'Сообщение',
            'type' => 'Тип',
            'status' => 'Статус',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

}
