<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "faqs".
 *
 * @property integer $id
    
 * @property integer $type
    
 * @property integer $status
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $text_ru
    
 * @property string $text_uz
    
 * @property string $text_en
    
 */
class Faqs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faqs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'string', 'max' => 1],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['text_ru', 'text_uz', 'text_en'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'status' => 'Статус',
            'title_ru' => 'Вопрос Ru',
            'title_uz' => 'Вопрос Uz',
            'title_en' => 'Вопрос En',
            'text_ru' => 'Ответ Ru',
            'text_uz' => 'Ответ Uz',
            'text_en' => 'Ответ En',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link_ru)){
                if( $this->link_ru == '' || isset($post['Faqs']['title_ru']) ){
                    $this->link_ru = TextHelper::Transliterate( $post['Faqs']['title_ru'] );
                }
            }

                            if(isset($this->link_uz)){
                if( $this->link_uz == '' || isset($post['Faqs']['title_uz']) ){
                    $this->link_uz = TextHelper::Transliterate( $post['Faqs']['title_uz'] );
                }
            }

                            if(isset($this->link_en)){
                if( $this->link_en == '' || isset($post['Faqs']['title_en']) ){
                    $this->link_en = TextHelper::Transliterate( $post['Faqs']['title_en'] );
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
