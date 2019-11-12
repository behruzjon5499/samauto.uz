<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "vacancy".
 *
 * @property integer $id
    
 * @property integer $category_id
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $text_ru
    
 * @property string $text_uz
    
 * @property string $text_en
    
 * @property integer $status
    
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_ru', 'text_uz', 'text_en'], 'string'],
            [['category_id', 'status'], 'string', 'max' => 1],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'text_ru' => 'Текст Ru',
            'text_uz' => 'Текст Uz',
            'text_en' => 'Текст En',
            'status' => 'Статус',
        ];
    }

    public function getCategory(){
        return $this->hasOne(VacancyCategory::className(),['id'=>'category_id']);
    }

    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link_ru)){
                if( $this->link_ru == '' || isset($post['Vacancy']['title_ru']) ){
                    $this->link_ru = TextHelper::Transliterate( $post['Vacancy']['title_ru'] );
                }
            }

                            if(isset($this->link_uz)){
                if( $this->link_uz == '' || isset($post['Vacancy']['title_uz']) ){
                    $this->link_uz = TextHelper::Transliterate( $post['Vacancy']['title_uz'] );
                }
            }

                            if(isset($this->link_en)){
                if( $this->link_en == '' || isset($post['Vacancy']['title_en']) ){
                    $this->link_en = TextHelper::Transliterate( $post['Vacancy']['title_en'] );
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