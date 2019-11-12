<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property string $id
 * @property string $date
 * @property string $date_view
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property integer $status
 * @property integer $type
 * @property string $msg
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'date_view', 'status', 'type'], 'integer'],
            [['name', 'msg'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['email','phone'], 'string', 'max' => 64],
            [['msg'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Дата создания'),
            'date_view' => Yii::t('app', 'Дата  просмотра'),
            'name' => Yii::t('app', 'Имя'),
            'phone' => Yii::t('app', 'Телефон'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Статус'),
            'type' => Yii::t('app', 'Тип сообщения'),
            'msg' => Yii::t('app', 'Сообщение'),
        ];
    }
}
