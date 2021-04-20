<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "pikups_page".
 *
 * @property integer $id
    
 * @property string $gallery_image
    
 * @property string $youtube_link

 * @property string $title_en

 * @property string $content_ru

 * @property string $content_uz

 * @property string $content_en
 */
class PikupsPage extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pikups_page';
    }
    public function afterDelete()
    {
        if ($this->gallery_image !== null && !empty($this->gallery_image)) {
            unlink(Yii::getAlias('@frontend').'/web/uploads/pikups-page/' . $this->gallery_image);
        }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'youtube_link','transport_id'], 'required'],
            [['gallery_image', 'youtube_link'], 'string', 'max' => 255],
            [['content_ru', 'content_uz', 'content_en'], 'string'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, bmp'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gallery_image' => Yii::t('app', 'Gallery Image'),
            'youtube_link' => Yii::t('app', 'Youtube Link'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_en' => Yii::t('app', 'Content En'),
        ];
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link)){
                if( $this->link == '' || isset($post['PikupsPage']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['PikupsPage']['title'] );
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

    public function upload()
    {
        if ($this->validate()) {
            $name = Yii::$app->security->generateRandomString(10) . '.' . $this->image->extension;

            if ($this->gallery_image !== null && !empty($this->gallery_image)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/pikups-page/' . $this->gallery_image);
            }
            $this->gallery_image = $name;
            $this->image->saveAs(Yii::getAlias('@frontend').'/web/uploads/pikups-page/' . $name);
            return true;
        } else {
            return false;
        }
    }
}