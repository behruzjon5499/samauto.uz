<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "news_gallery".
 *
 * @property integer $id
    
 * @property integer $news_id
    
 * @property integer $type
    
 * @property string $image
    
 */
class NewsGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id'], 'integer'],
            [['type'], 'string', 'max' => 1],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'Новость',
            'type' => 'Тип',
            'image' => 'Фото',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {


            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
                //print_r(Yii::$app->request->get()); exit;

                $this->news_id = (int)Yii::$app->request->get('news_id');
            }

            if(isset($this->link)){
                if( $this->link == '' && isset($post['NewsGallery']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['NewsGallery']['title'] );
                }
            }

            if( $this->type == 1 ){ // видео

                $link = explode('v=', $post['video-url'] ); // 'https://www.youtube.com/watch?v=CPzSoi2-xJQ';
                if(count($link)>1) $this->image = 'https://www.youtube.com/embed/' . @$link[1];

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

                $path = Yii::getAlias("@frontend/web/uploads/news-gallery");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/news-gallery/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
                Image::thumbnail($filepath, 155, 85)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 650, 350)
                    ->save($path . $fname , ['quality' => 100]);

                $this->image = $fname;
                if(!$this->save()){
                    print_r($model->getErrors()); exit;
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
