<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cars_slider".
 *
 * @property int $id
 * @property int $category_id
 * @property int $status
 * @property string $image
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $text_ru
 * @property string $text_uz
 * @property string $text_en
 */
class CarsSlider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status','frames'], 'integer'],
            [['image'], 'string', 'max' => 16],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['text_ru', 'text_uz', 'text_en'], 'string', 'max' => 512],
            ['frames', 'required'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Категория'),
            'status' => Yii::t('app', 'Статус'),
            'image' => Yii::t('app', 'Фото'),
            'title_ru' => Yii::t('app', 'Заголовок Ru'),
            'title_uz' => Yii::t('app', 'Заголовок Uz'),
            'title_en' => Yii::t('app', 'Заголовок En'),
            'text_ru' => Yii::t('app', 'Текст Ru'),
            'text_uz' => Yii::t('app', 'Текст Uz'),
            'text_en' => Yii::t('app', 'Текст En'),
            'frames' => Yii::t('app', 'Количество кадров спрайта'),
        ];
    }

    public function updateModel($new=false)
    {

        //$image = 'tmp_image';

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается
                // только один раз при создании
                // $this->date = time();
            }

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            try {

                if ($file = UploadedFile::getInstance($this, 'tmp_image')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!

                    $fname = time() . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс

                    $path = Yii::getAlias("@frontend/web/uploads/cars-slider/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    //Image::crop($filepath,1800,1100);
                    Image::thumbnail($filepath, 500, 25)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    //
                   /* Image::thumbnail($filepath, 800, 450)
                        ->save($path . $fname, ['quality' => 100]);*/

                    // удалить оригинал 'orig_'
                    //@unlink($filepath);

                    $this->image = $fname;
                    if (!$this->save()) {
                        //print_r($model->getErrors());
                        return false;
                        exit;
                    }

                }

            }catch (Exception $e) {
                print_r($e);
                exit;
            }

            Yii::$app->session->setFlash('info-success','Сохранение успешно!');

            return true;
        }
        return false;

    }

    // получаем категорию
    public function getCategory(){

        return $this->hasOne( CategoriesCars::className(), [ 'id' => 'category_id' ] );

    }

}
