<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "career_question".
 *
 * @property integer $id
    
 * @property string $fullname
    
 * @property string $message
    
 * @property string $phone
    
 * @property string $email
    
 * @property integer $status
    
 * @property string $created_at
    
 * @property string $updated_at
    
 */
class CareerQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'career_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'message', 'phone', 'email'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['fullname'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Ф.И.О',
            'message' => 'Сообщение',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

}
