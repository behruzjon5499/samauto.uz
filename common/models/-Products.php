<?php

namespace common\models;

use common\helpers\TextHelper;
use Yii;


use yii\base\Exception;
use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $date
 * @property string $code
 * @property string $title
 * @property string $link
 * @property string $text
 * @property int $cat_id
 * @property int $brand_id
 * @property string $price
 * @property string $old_price
 * @property int $added_date
 * @property int $image
 * @property int $status
 * @property int $sale
 * @property int $hit
 * @property int $top
 * @property int $banner
 * @property int $quantity
 * @property int $video_link
 * @property int $color_id
 * @property int $quality_id
 */

class Products extends \yii\db\ActiveRecord
{

    public $pcount;
    public $tmp_image;
    public $price_min;
    public $price_max;

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
            [['cat_id', 'brand_id', 'added_date', 'status', 'sale', 'hit', 'quantity','color_id','quality_id','collection_id','style_id','date','top','banner'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['code'], 'string', 'max' => 50],
            [['text_ru','text_uz','text_en','meta_key_ru','meta_descr_ru','meta_key_uz','meta_descr_uz','meta_key_en','meta_descr_en'], 'string'],
            [['video_link','size','material_ru','material_uz','material_en'], 'string', 'max' => 255],
            [['title_ru', 'link_ru','title_uz', 'link_uz','title_en', 'link_en', 'image'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'дата добавления',
            'code' => 'Код продукта',
            'cat_id' => 'Категория',
            'brand_id' => 'Brand',
            'color_id' => 'Цвет',
            'quality_id' => 'Качество',
            'collection_id' => 'Коллекция',
            'style_id' => 'Стиль',
            'price' => 'Стоимость',
            'old_price' => 'Старая цена',
            'added_date' => 'Added Date',
            'status' => 'Статус',
            'image' => 'Изображение',
            'sale' => 'Скидки',
            'hit' => 'Hit',
            'top' => 'В топе',
            'banner' => 'Баннер товара в слайдере',
            'quantity' => 'Количество',
            'video_link' => 'Ссылка на youtube видео',
            'category' => 'Категория',
            'title_ru' => 'Заголовок',
            'link_ru' => 'Ссылка',
            'text_ru' => 'Текст',
            'title_uz' => 'Заголовок',
            'link_uz' => 'Ссылка',
            'text_uz' => 'Текст',
            'title_en' => 'Заголовок',
            'link_en' => 'Ссылка',
            'text_en' => 'Текст',
            'material_ru' => 'Материал RU',
            'material_uz' => 'Материал UZ',
            'material_en' => 'Материал EN',
            'meta_key_ru' => 'Мета ключевые слова',
            'meta_descr_ru' => 'Мета описание',
            'meta_key_uz' => 'Мета ключевые слова',
            'meta_descr_uz' => 'Мета описание',
            'meta_key_en' => 'Мета ключевые слова',
            'meta_descr_en' => 'Мета описание',
        ];
    }

    public function updateModel($new=false)
    {

        $image = 'tmp_image';

        $post = Yii::$app->request->post();

        if($this->load($post) ) {
            $vl =  str_replace('watch?v=','embed/',$post['Products']['video_link']);

            $this->video_link = $vl;
            if( $new ){ // если создается
                // только один раз при создании
                $this->added_date = time();
            }

            $this->link_ru = TextHelper::Transliterate( $post['Products']['title_ru'] );
            $this->link_uz = TextHelper::Transliterate( $post['Products']['title_uz'] );
            $this->link_en = TextHelper::Transliterate( $post['Products']['title_en'] );


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
                    Image::thumbnail($filepath, 200, 100)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    //
                    Image::thumbnail($filepath, 500, 250)
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

                if ($file = UploadedFile::getInstance($this, 'tmp_image_top')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!

                    $fname = 'top.jpg'; // $file->extension;

                    $path = Yii::getAlias("@frontend/web/uploads/products/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 200, 100)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    Image::thumbnail($filepath, 1120, 660)
                        ->save($path . $fname, ['quality' => 100]);

                    // удалить оригинал 'orig_'
                    //@unlink($filepath);

                    //$this->image = $fname;
                    if (!$this->save()) {
                        //print_r($model->getErrors());
                        return false;
                        exit;
                    }

                }

                if ($file = UploadedFile::getInstance($this, 'tmp_image_banner')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!

                    $fname = 'banner.jpg'; // $file->extension;

                    $path = Yii::getAlias("@frontend/web/uploads/products/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 200, 200)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    Image::thumbnail($filepath, 450, 450)
                        ->save($path . $fname, ['quality' => 100]);

                    // удалить оригинал 'orig_'
                    //@unlink($filepath);

                    //$this->image = $fname;
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

                        $gallery = new Images();
                        //$gallery->date = time();
                        $gallery->image = $fname;
                        $gallery->product_id = $this->id;
                        //$gallery->type = 0; // 2-slider
                        //$gallery->title_ru = TextHelper::Transliterate($title) . '.'. $file->extension;

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

    // информация о товаре
    public function getInfo()
    {
        return $this->hasOne(ProductInfo::className(), ['product_id' => 'id']);
    }

    // галерея изображений
    public function getGallery()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id']);
    }

    // категории
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id'])->with('parent');
    }

    // бренд
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    // комментарии по товару
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['product_id' => 'id'])->with('user')->orderBy('date DESC');
    }
    // цвет
    public function getColor()
    {
        return $this->hasOne(Colors::className(), ['id' => 'color_id']);
    }
    // качество
    public function getQuality()
    {
        return $this->hasOne(Quality::className(), ['id' => 'quality_id']);
    }
    // коллекция
    public function getCollection()
    {
        return $this->hasOne(Collections::className(), ['id' => 'collection_id']);
    }

    public function getCollectTitle()
    {
        if ($collect = Collections::find()->where(['id' => $this->collection_id])->one()) {
            $lang = Yii::$app->session->get('lang');
            if ($lang == '') $lang = 'ru';
            $title = 'title_' . $lang;
            return $collect->$title;
        }
    }

    public function getStyleTitle()
    {
        if( $collect = Styles::find()->where(['id' => $this->style_id ])->one() ){
             $lang = Yii::$app->session->get('lang');
             if($lang=='') $lang='ru';
            $title = 'title_' . $lang;
            return $collect->$title ;
        }

    }


    // стиль
    public function getStyle()
    {
        return $this->hasOne(Styles::className(), ['id' => 'style_id']);
    }

    public function getProductInfo()
    {
        return $this->hasOne(ProductInfo::className(), ['id' => 'product_id']);
    }

}
