<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects_order".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $text
 * @property int $status
 * @property int $style_id
 * @property string $image
 */
class ProjectsOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status','style_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 24],
            [['image'], 'string', 'max' => 16],
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
            'style_id' => 'Стиль',
            'email' => 'Email',
            'phone' => 'Телефон',
            'text' => 'Сообщение',
            'status' => 'Статус',
            'image' => 'Image',
        ];
    }
}
