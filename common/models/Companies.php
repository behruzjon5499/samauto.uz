<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_uz
 * @property string $name_en
 * @property string $text_ru
 * @property string $text_uz
 * @property string $text_en
 * @property string $address_ru
 * @property string $address_uz
 * @property string $address_en
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $days_ru
 * @property string $days_uz
 * @property string $days_en
 * @property string $phone
 * @property string $email
 * @property int $region_id
 * @property int $city_id
 * @property string $lat
 * @property string $lon
 * @property string $image
 * @property int $status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'status'], 'integer'],
            [['name_ru', 'name_uz', 'name_en'], 'string', 'max' => 128],
            [['text_ru', 'text_uz', 'text_en', 'address_ru', 'address_uz', 'address_en', 'days_ru', 'days_uz', 'days_en', 'phone', 'email'], 'string', 'max' => 512],
            [['doljnost_ru', 'doljnost_uz', 'doljnost_en'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 16],
        ];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название Ru',
            'name_uz' => 'Название Uz',
            'name_en' => 'Название En',
            'text_ru' => 'Описание Ru',
            'text_uz' => 'Описание Uz',
            'text_en' => 'Описание En',
            'days_ru' => 'Дни приема Ru',
            'days_uz' => 'Дни приема Uz',
            'days_en' => 'Дни приема En',
            'address_ru' => 'Адрес Ru',
            'address_uz' => 'Адрес Uz',
            'address_en' => 'Адрес En',
            'doljnost_ru' => 'Должность Ru',
            'doljnost_uz' => 'Должность Uz',
            'doljnost_en' => 'Должность En',
            'phone' => 'Телефон',
            'email' => 'Email',
            'image' => 'Фото',
            'status' => 'Статус',
        ];
    }

    public function getRegion(){

        return $this->hasOne( Regions::className(),['id' => 'region_id'] );

    }
    /* public function getDoljnost(){

        return $this->hasOne( Co::className(),['company_id' => 'id'] )->with('doljnost')->where(['doljnost_id'=>1]);

    }  */
    public function getDirector(){

        return $this->hasOne( CompanyUsers::className(),['company_id' => 'id','type'=>1] );

    }
    public function getWorkers(){

        return $this->hasMany( CompanyUsers::className(),['parent_id' => 'id'] )->where(['status'=>1]);

    }

    /* public function getGallery(){

        return $this->hasMany( CompanyGallery::className(),['company_id' => 'id'] );

    } */

    public function updateModel($new=false)
    {

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается
                // только один раз при создании
            }

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            // print_r($_FILES); exit;
            try {

                if ($file = UploadedFile::getInstance($this, 'tmp_image')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!

                    $fname = time() . '.' . $file->extension;

                    //echo $fname; exit;

                    $path = Yii::getAlias("@frontend/web/uploads/companies/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 75, 100)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    //
                    Image::thumbnail($filepath, 225, 300)
                        ->save($path . $fname, ['quality' => 100]);

                    // удалить оригинал 'orig_'
                    //@unlink($filepath);

                    $this->image = $fname;
                    if (!$this->save()) {
                        //print_r($model->getErrors());
                        return false;
                        exit;
                    }

                }

                /*
                // изображения галереи
                if( $files = UploadedFile::getInstances($this, 'tmp_gallery_images' ) ) {
                    $deleted_files = explode(';', $post['delete_gallery_files']);
                    $i = 0;
                    foreach ($files as $file) {
                        $i++;
                        if( ! preg_match('/image/',$file->type) ) continue; // пропустить если не картинка
                        // данный файл удален пользователем
                        if (in_array($i, $deleted_files)) continue;
                        $fid = time() + $i;
                        $fname = $fid . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс
                        $path_main = Yii::getAlias("@frontend/web/uploads/companies/{$this->id}");
                        $path = Yii::getAlias("@frontend/web/uploads/companies/{$this->id}/gallery/");
                        if (!is_dir($path_main)) @mkdir($path_main);
                        if (!is_dir($path)) @mkdir($path);
                        if(!is_dir($path.'thumb')) @mkdir($path .'thumb');
                        // основная картинка - оригинал
                        $file->saveAs($path . $fname); // . $file->extension);
                        $gallery = new CompanyGallery();
                        $gallery->image = $fname;
                        $gallery->company_id = $this->id;
                        $gallery->save();
                        $filepath = $path . $fname ;
                        // эскиз
                        Image::thumbnail($filepath, 100, 50)
                            ->save($path . 'thumb/' . $fname , ['quality' => 100]);
                        // эскиз
                        Image::thumbnail($filepath, 1200, 740)
                            ->save($path . $fname , ['quality' => 100]);
                    }
                } */

            }catch (Exception $e) {
                print_r($e);
                exit;
            }

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            Yii::$app->session->setFlash('info-success','Компания успешно сохранена!');

            return true;
        }
        return false;

    }

}
