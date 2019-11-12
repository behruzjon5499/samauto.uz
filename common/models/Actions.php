<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "actions".
 *
 * @property integer $id
    
 * @property integer $date_start
    
 * @property integer $date_end
    
 * @property integer $created_at
    
 * @property string $image
    
 * @property string $link
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $text_ru
    
 * @property string $text_uz
    
 * @property string $text_en
    
 * @property integer $status
    
 */
class Actions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end', 'created_at'], 'integer'],
            [['text_ru', 'text_uz', 'text_en'], 'string'],
            [['image'], 'string', 'max' => 16],
            [['link'], 'string', 'max' => 256],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 128],
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
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'created_at' => 'Created At',
            'image' => 'Изображение',
            'link' => 'Ссылка',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'text_ru' => 'Текст Ru',
            'text_uz' => 'Текст Uz',
            'text_en' => 'Текст En',
            'status' => 'Статус',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                $this->created_at = time();
                $path = Yii::getAlias("@frontend/web/uploads/actions");
                if(!is_dir($path)) @mkdir($path);
            }

            $this->date_start = strtotime($post['Actions']['date_start']);
            $this->date_end = strtotime($post['Actions']['date_end']);


            if( $this->link == '' || isset($post['Actions']['title_ru']) ){
                $this->link = TextHelper::Transliterate( $post['Actions']['title_ru'] );
            }

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;
                return true;
            }
            // сохранение изображения

            if( $file = UploadedFile::getInstance($this, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/actions/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
               /* Image::thumbnail($filepath, 100, 100)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 300, 300)
                    ->save($path . $fname , ['quality' => 100]);*/

                $this->image = $fname;
                if(!$this->save()){
                    print_r($this->getErrors()); exit;
                    return false;
                    exit;
                }

            }

            
            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

}
