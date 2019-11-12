<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "transport_gallery".
 *
 * @property integer $id
    
 * @property integer $transport_id
    
 * @property string $image
    
 */
class TransportGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transport_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transport_id'], 'integer'],
            [['image'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transport_id' => 'Transport ID',
            'image' => 'Image',
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

            if(isset($this->link)){
                if( $this->link == '' || isset($post['TransportGallery']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['TransportGallery']['title'] );
                }
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

                $path = Yii::getAlias("@frontend/web/uploads/transport-gallery");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/transport-gallery/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
                Image::thumbnail($filepath, 100, 100)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 300, 300)
                    ->save($path . $fname , ['quality' => 100]);

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
