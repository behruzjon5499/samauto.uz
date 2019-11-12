<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "receptions".
 *
 * @property integer $id
    
 * @property integer $user_id
    
 * @property integer $date
    
 * @property integer $status
    
 * @property string $username
    
 * @property string $subject
    
 * @property string $company
    
 * @property string $email
    
 * @property string $phone
    
 * @property string $text
    
 */
class Receptions extends \yii\db\ActiveRecord
{

    //public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receptions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'date'], 'required'],
            [['user_id', 'date','status'], 'integer'],
            [['username', 'company'], 'string', 'max' => 128],
            [['subject'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 32],
            [['text'], 'string', 'max' => 1024],
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'К кому',
            'date' => 'Дата',
            'status' => 'Статус',
            'username' => 'Ф.И.О',
            'subject' => 'Тема',
            'company' => 'Организация',
            'email' => 'Email',
            'phone' => 'Телефон',
            'text' => 'Сообщение',
        ];
    }

    public function getUser(){

        return $this->hasOne(CompanyUsers::className(),['id'=>'user_id']);
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link)){
                if( $this->link == '' || isset($post['Receptions']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['Receptions']['title'] );
                }
            }

            
            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }


            
            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

}
