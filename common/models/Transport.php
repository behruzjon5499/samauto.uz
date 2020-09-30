<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "transport".
 *
 * @property integer $id
    
 * @property integer $status
    
 * @property integer $type
    
 * @property string $type_id
    
 * @property integer $category_id
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
 *
 * @property string $file_title_ru

 * @property string $file_title_uz

 * @property string $file_title_en
    
 * @property string $image
    
 * @property string $data
    
 */
class Transport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id','pos'], 'integer'],
            [['data','model'], 'string'],
            [['status'], 'integer', 'max' => 1],
            [['type'], 'integer', 'max' => 3],
            [['type_id', 'title_ru', 'title_uz', 'title_en'], 'string', 'max' => 128],
            [['file_title_ru','file_title_uz','file_title_en'], 'string', 'max' => 255],
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
            'status' => 'Статус',
            'type' => 'Вид',
            'model' => 'Модель',
            'type_id' => 'Тип кузова',
            'category_id' => 'Категория',
            'title_ru' => 'Название Ru',
            'title_uz' => 'Название Uz',
            'title_en' => 'Название En',
            'file_title_ru' => 'Заголовок прикрепленного файла Ru',
            'file_title_uz' => 'Заголовок прикрепленного файла Uz',
            'file_title_en' => 'Заголовок прикрепленного файла En',
            'image' => 'Фото',
            'data' => 'Data',
            'pos' => 'Порядок',
        ];
    }

    public function getGallery(){
        return $this->hasMany(TransportGallery::className(),['transport_id'=>'id']);
    }

    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ) { // если создается только один раз при создании
                //$this->date = time();
            }

            $options['complect'] = isset($post['complect']) ? $post['complect'] : '';

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            $data = json_decode($this->data,true);

            // print_r($data); exit;

            // сохранение изображения

            if( $file = UploadedFile::getInstance( $this, 'tmp_file' ) ){

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/transport");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/transport/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                $options['complect']['file'] = $fname;

            }elseif(isset($data['complect']['file']) ){
                $options['complect']['file'] = $data['complect']['file'];
            }

            if( $file = UploadedFile::getInstance( $this, 'tmp_image' ) ){

                if( ! preg_match('/image\//', $file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/transport");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/transport/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
                Image::thumbnail($filepath, 320, 200)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 960, 600)
                    ->save($path . $fname , ['quality' => 100]);

                $this->image = $fname;
                if(!$this->save()){
                    print_r($this->getErrors()); exit;
                    return false;
                }

            }

            // изображения галереи
            if( $files = UploadedFile::getInstances($this, 'tmp_gallery_images' ) ) {
                $deleted_files = explode(';', $post['delete_gallery_image']);
                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    if( ! preg_match('/image/',$file->type) ) continue; // пропустить если не картинка
                    // данный файл удален пользователем
                    if (in_array($i, $deleted_files)) continue; // пропустить, если файл отменен
                    $fid = time() + $i;
                    $fname = $fid . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс
                    $path_main = Yii::getAlias("@frontend/web/uploads/transport/{$this->id}");
                    $path = Yii::getAlias("@frontend/web/uploads/transport/{$this->id}/gallery/");
                    if (!is_dir($path_main)) @mkdir($path_main);
                    if (!is_dir($path)) @mkdir($path);
                    if(!is_dir($path.'thumb')) @mkdir($path .'thumb');
                    // основная картинка - оригинал
                    $file->saveAs($path . $fname); // . $file->extension);
                    $gallery = new TransportGallery();
                    $gallery->image = $fname;
                    $gallery->transport_id = $this->id;
                    $gallery->save();
                    $filepath = $path . $fname ;
                    // эскиз
                    Image::thumbnail($filepath, 380, 230)
                        ->save($path . 'thumb/' . $fname , ['quality' => 100]);
                    // эскиз
                    Image::thumbnail($filepath, 1200, 800)
                        ->save($path . $fname , ['quality' => 100]);
                }
            }

            $this->data = json_encode($options, JSON_UNESCAPED_UNICODE);

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                //exit;

                return false;
            }

            
            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }

        return false;

    }

}
