<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "vacancy_category".
 *
 * @property integer $id
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property integer $status
    
 */
class VacancyCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'status' => 'Статус',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link_ru)){
                if( $this->link_ru == '' || isset($post['VacancyCategory']['title_ru']) ){
                    $this->link_ru = TextHelper::Transliterate( $post['VacancyCategory']['title_ru'] );
                }
            }

                            if(isset($this->link_uz)){
                if( $this->link_uz == '' || isset($post['VacancyCategory']['title_uz']) ){
                    $this->link_uz = TextHelper::Transliterate( $post['VacancyCategory']['title_uz'] );
                }
            }

                            if(isset($this->link_en)){
                if( $this->link_en == '' || isset($post['VacancyCategory']['title_en']) ){
                    $this->link_en = TextHelper::Transliterate( $post['VacancyCategory']['title_en'] );
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
