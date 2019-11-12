<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dillers_services".
 *
 * @property integer $id
    
 * @property integer $office_id
 *
 * @property integer $diller_id

 * @property integer $status
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $username_ru
    
 * @property string $username_uz
    
 * @property string $username_en
    
 * @property string $doljnost_ru
    
 * @property string $doljnost_uz
    
 * @property string $doljnost_en
    
 * @property string $phone
    
 * @property string $text_ru
    
 * @property string $text_uz
    
 * @property string $text_en
    
 * @property string $phones
    
 * @property string $fax
    
 * @property string $email
    
 * @property string $site
    
 * @property string $lat
    
 * @property string $lon
 * @property string $image

 */
class DillersServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dillers_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['office_id','diller_id'], 'integer'],
            [['status'], 'string', 'max' => 1],
            [['title_ru', 'title_uz', 'title_en', 'username_ru', 'username_uz', 'username_en', 'doljnost_ru', 'doljnost_uz', 'doljnost_en', 'phones'], 'string', 'max' => 255],
            [['phone', 'fax', 'email', 'site'], 'string', 'max' => 128],
            [['text_ru', 'text_uz', 'text_en'], 'string', 'max' => 512],
            [['lat', 'lon'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 16]
        ];
    }


    public function getDiller(){
        return $this->hasOne(Dillers::className(),['id'=>'diller_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_id' => 'Офис сервисного центра',
            'diller_id' => 'Дилер',
            'status' => 'Статус',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'username_ru' => 'ФИО Ru',
            'username_uz' => 'ФИО Uz',
            'username_en' => 'ФИО En',
            'doljnost_ru' => 'Должность Ru',
            'doljnost_uz' => 'Должность Uz',
            'doljnost_en' => 'Должность En',
            'phone' => 'Телефон дилера',
            'text_ru' => 'Адрес Ru',
            'text_uz' => 'Адрес Uz',
            'text_en' => 'Адрес En',
            'phones' => 'Телефоны сервиса (с новой строки)',
            'fax' => 'Факс',
            'email' => 'Email',
            'site' => 'Сайт',
            'lat' => 'Широта',
            'lon' => 'Долгота',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
                $this->diller_id = Yii::$app->request->get('diller_id');
            }



            // сохранение изображения

            if( $file = UploadedFile::getInstance($this, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/dillers/" . $this->diller_id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
                Image::thumbnail($filepath, 100, 60)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 500, 300)
                    ->save($path . $fname , ['quality' => 100]);

                $this->image = $fname;
                if(!$this->save()){
                    print_r($this->getErrors()); exit;
                    return false;
                    exit;
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
