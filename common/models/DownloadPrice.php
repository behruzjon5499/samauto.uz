<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "download_price".
 *
 * @property integer $id
    
 * @property integer $date
    
 * @property string $username
    
 * @property string $email
    
 * @property string $company
    
 * @property string $phone
    
 * @property integer $status
    
 */
class DownloadPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date','status'], 'integer'],
            [['username', 'email'], 'string', 'max' => 64],
            [['company'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 32],
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
            'username' => 'Имя',
            'email' => 'Email',
            'company' => 'Компания',
            'phone' => 'Телефон',
            'status' => 'Статус',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            
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
