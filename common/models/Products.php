<?php

namespace common\models;

use common\helpers\TextHelper;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $cat_id категория - локализация
 * @property int $status
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $text_ru
 * @property string $text_uz
 * @property string $text_en
 * @property string $num номер детали
 * @property string $model
 * @property string $quantity кол-во на 1 авто
 * @property string $mass
 * @property string $material_ru
 * @property string $material_uz
 * @property string $material_en
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $weight
 * @property string $image
 */
class Products extends \yii\db\ActiveRecord
{
    public $tmp_image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'status', 'hit'], 'integer'],
            [['title_ru','text_ru'], 'required'],
            [['text_ru', 'text_uz', 'text_en'], 'string'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['num', 'model', 'material_ru', 'material_uz', 'material_en'], 'string', 'max' => 128],
            [['quantity'], 'string', 'max' => 8],
            [['mass', 'length', 'width', 'height', 'weight', 'quantity'], 'string', 'max' => 12],
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
            'cat_id' => 'Категория',
            'category' => 'Категория', // только для подписи
            'status' => 'Статус',
            'title_ru' => 'Название Ru',
            'title_uz' => 'Название Uz',
            'title_en' => 'Название En',
            'text_ru' => 'Описание Ru',
            'text_uz' => 'Описание Uz',
            'text_en' => 'Описание En',
            'num' => 'Номер',
            'model' => 'Модель',
            'quantity' => 'Кол-во на 1 авто',
            'mass' => 'Масса, кг',
            'material_ru' => 'Матегриал RU',
            'material_uz' => 'Матегриал UZ',
            'material_en' => 'Матегриал EN',
            'length' => 'Длина',
            'width' => 'Ширина',
            'height' => 'Высота',
            'weight' => 'Толщина',
            'image' => 'Изображение',
            'hit' => 'Показать в слайдере',
        ];
    }
    public function updateModel($new=false)
    {

        $image = 'tmp_image';

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

                    $path = Yii::getAlias("@frontend/web/uploads/products/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 160, 96)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    //
                    Image::thumbnail($filepath, 500, 300)
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

                        $path_main = Yii::getAlias("@frontend/web/uploads/products/{$this->id}");
                        $path = Yii::getAlias("@frontend/web/uploads/products/{$this->id}/gallery/");

                        if (!is_dir($path_main)) @mkdir($path_main);
                        if (!is_dir($path)) @mkdir($path);
                        if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                        // основная картинка - оригинал
                        $file->saveAs($path . $fname); // . $file->extension);

                        $gallery = new ProductsGallery();
                        $gallery->image = $fname;
                        $gallery->product_id = $this->id;
                        $gallery->save();

                        $filepath = $path . $fname ;

                        // эскиз
                        Image::thumbnail($filepath, 100, 50)
                            ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                        // эскиз
                        Image::thumbnail($filepath, 1200, 740)
                            ->save($path . $fname , ['quality' => 100]);

                    }
                }

            }catch (Exception $e) {
                print_r($e);
                exit;
            }

            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

    // галерея изображений
    public function getGallery()
    {
        return $this->hasMany(ProductsGallery::className(), ['product_id' => 'id']);
    }

    // категории
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id'])->with('parent');
    }


}
