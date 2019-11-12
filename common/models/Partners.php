<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $text
 * @property int $callback заказать обратный звонок
 * @property int $catalog заказать каталог
 * @property int $status 1-прочитано 0-нет
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callback', 'catalog', 'status'], 'integer'],
            [['name', 'email'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 24],
            [['text'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'text' => 'Сообщение',
            'callback' => 'Заказан звонок',
            'catalog' => 'Заказан каталог',
            'status' => 'Статус',
        ];
    }
}
