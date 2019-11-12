<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dillers".
 *
 * @property integer $id
    
 * @property integer $region_id
    
 * @property integer $status
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $link_ru
    
 * @property string $link_uz
    
 * @property string $link_en
    
 * @property string $text_ru
    
 * @property string $text_uz
    
 * @property string $text_en
    
 * @property string $address_ru
    
 * @property string $address_uz
    
 * @property string $address_en
    
 * @property string $phone
    
 * @property string $email
    
 * @property string $site
    
 * @property string $image
 * @property string $file_cert

 */

class Dillers extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dillers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id','status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'link_ru', 'link_uz', 'link_en'], 'string', 'max' => 255],
            [['text_ru', 'text_uz', 'text_en', 'address_ru', 'address_uz', 'address_en', 'phone'], 'string', 'max' => 512],
            [['email', 'site'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 16],
            [['file_cert'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Область',
            'status' => 'Статус',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'link_ru' => 'Ссылка Ru',
            'link_uz' => 'Ссылка Uz',
            'link_en' => 'Ссылка En',
            'text_ru' => 'Текст Ru',
            'text_uz' => 'Текст Uz',
            'text_en' => 'Текст En',
            'address_ru' => 'Адрес Ru',
            'address_uz' => 'Адрес Uz',
            'address_en' => 'Адрес En',
            'phone' => 'Телефон',
            'email' => 'Email',
            'site' => 'Сайт',
            'image' => 'Изображение',
        ];
    }


    // офис диллера 1 шт всегда
    public function getOffice(){
        return $this->hasOne(DillersOffice::className(),['diller_id'=>'id'])->with(['services']);
    }

    // все сервисы диллера
    public function getServices(){
        return $this->hasMany(DillersServices::className(),['diller_id'=>'id']);
    }

    // все id офисов
    public function getOfficeAll(){
        return $this->hasMany(DillersOffice::className(),['diller_id'=>'id']);//->select('id');
    }

    // все id сервисы диллера
    public function getServicesAll(){
        return $this->hasMany(DillersServices::className(),['diller_id'=>'id']);//->select('id');
    }



    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {
            if( $this->link_ru == '' || isset($post['Dillers']['title_ru']) ){
                $this->link_ru = TextHelper::Transliterate( $post['Dillers']['title_ru'] );
            }

            if( $this->link_uz == '' || isset($post['Dillers']['title_uz']) ){
                $this->link_uz = TextHelper::Transliterate( $post['Dillers']['title_uz'] );
            }

            if( $this->link_en == '' || isset($post['Dillers']['title_en']) ){
                $this->link_en = TextHelper::Transliterate( $post['Dillers']['title_en'] );
            }

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;
            }

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
                $path = Yii::getAlias("@frontend/web/uploads/dillers");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/dillers/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
            }

            // сохранение изображения

            if( $file = UploadedFile::getInstance($this, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                //$path = Yii::getAlias("@frontend/web/uploads/dillers");
               // if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/dillers/" . $this->id . '/' );
                //if(!is_dir($path)) @mkdir($path);
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

            // изображения инфо блока салон на главной
            if( $file = UploadedFile::getInstance($this, 'tmp_file_cert' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname =  TextHelper::Transliterate($file->baseName) . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/dillers/{$this->id}/" );

                if(!is_dir($path)) @mkdir($path);

                // сохраняем файл
                $file->saveAs($path . $fname );

                $this->file_cert = $fname;
                if(!$this->save()){
                    print_r($this->getErrors()); exit;
                    return false;
                    exit;
                }

            }

            //echo '<pre>';print_r($post); exit;

            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

    public function getRegion(){

        return $this->hasOne(Regions::className(),['id'=>'region_id']);

    }


}
