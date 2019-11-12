<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dillers_office".
 *
 * @property integer $id
    
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
    
 */
class DillersOffice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dillers_office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','diller_id'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'username_ru', 'username_uz', 'username_en', 'doljnost_ru', 'doljnost_uz', 'doljnost_en', 'phones'], 'string', 'max' => 255],
            [['phone', 'fax', 'email', 'site'], 'string', 'max' => 128],
            [['text_ru', 'text_uz', 'text_en'], 'string', 'max' => 512],
            [['lat', 'lon'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'diller_id' => 'Дилер',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'username_ru' => 'Ф.И.О Ru',
            'username_uz' => 'Ф.И.О Uz',
            'username_en' => 'Ф.И.О En',
            'doljnost_ru' => 'Должность Ru',
            'doljnost_uz' => 'Должность Uz',
            'doljnost_en' => 'Должность En',
            'phone' => 'Телефон',
            'text_ru' => 'Текст Ru',
            'text_uz' => 'Текст Uz',
            'text_en' => 'Текст En',
            'phones' => 'Телефон',
            'fax' => 'Факс',
            'email' => 'Email',
            'site' => 'Сайт',
            'lat' => 'Широта',
            'lon' => 'Долгота',
        ];
    }

    // все сервисы диллера для текущего офиса
    public function getServices(){
        return $this->hasMany(DillersServices::className(),['office_id'=>'id']);
    }

    public function getDiller(){
        return $this->hasOne(Dillers::className(),['id'=>'diller_id']);
    }

    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
                $this->diller_id = Yii::$app->request->get('diller_id');

            }

            if(isset($this->link_ru)){
                if( $this->link_ru == '' || isset($post['DillersOffice']['title_ru']) ){
                    $this->link_ru = TextHelper::Transliterate( $post['DillersOffice']['title_ru'] );
                }
            }

            if(isset($this->link_uz)){
                if( $this->link_uz == '' || isset($post['DillersOffice']['title_uz']) ){
                    $this->link_uz = TextHelper::Transliterate( $post['DillersOffice']['title_uz'] );
                }
            }

            if(isset($this->link_en)){
                if( $this->link_en == '' || isset($post['DillersOffice']['title_en']) ){
                    $this->link_en = TextHelper::Transliterate( $post['DillersOffice']['title_en'] );
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
