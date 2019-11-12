<?php

namespace common\models;

use common\helpers\TextHelper;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $date дата публикации
 * @property int $views просмотров
 * @property string $image изображения
 * @property string $link
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $text_ru
 * @property string $text_en
 * @property string $text_uz
 * @property int $status
 * @property int $hit
 */
class News extends \yii\db\ActiveRecord
{
    public $year_list; // для списка годов

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status','date','hit'], 'integer'],
            [['text_ru','text_uz','text_en'], 'string'],
            [['image'], 'string', 'max' => 16],
            [['link_ru','link_uz','link_en'], 'string', 'max' => 256],
            [['title_ru','title_uz','title_en'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата публикацим',
            'image' => 'Фото',
            'link_ru' => 'Ссылка RU',
            'link_uz' => 'Ссылка UZ',
            'link_en' => 'Ссылка EN',
            'title_ru' => 'Название RU',
            'text_ru' => 'Текст RU',
            'title_uz' => 'Название UZ',
            'text_uz' => 'Текст UZ',
            'title_en' => 'Название EN',
            'text_en' => 'Текст EN',
            'status' => 'Статус',
            'hit' => 'Показать на главной',
        ];
    }


    public function updateModel($new=false)
    {

        $post = Yii::$app->request->post();

        // print_r($post); exit;

        if($this->load($post) ) {

            if( $new ){ // если создается
                // только один раз при создании
                //$this->added_date = time();
            }

            // if( $model->link == '' || isset($post['News']['title']) ) {
            $this->link_ru = TextHelper::Transliterate( $post['News']['title_ru'] );
            $this->link_uz = TextHelper::Transliterate( $post['News']['title_uz'] );
            $this->link_en = TextHelper::Transliterate( $post['News']['title_en'] );
            //}

            $this->date = strtotime($post['News']['date']);

            //exit;

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            // print_r($post); exit;

            $this_year = (int)date('Y',$this->date);

            //Yii::$app->cache->delete('year');

            if($year = (int)Yii::$app->cache->get('year')){
                if($year > $this_year){ // перезапись даты
                    $min_year = News::getMinYear(); // минимальный год новостей в бд
                    // если в бд дата больше
                    if($min_year>$this_year) Yii::$app->cache->set('year', $this_year); // записать в кеш меньший год
                };

            }else{
                Yii::$app->cache->set('year', $this_year); // записать в кеш меньший год
            }

            try {

                if ($file = UploadedFile::getInstance($this, 'tmp_image')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!

                    $fname = time() . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс

                    $path = Yii::getAlias("@frontend/web/uploads/news/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 300, 168)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    Image::thumbnail($filepath, 1200, 675)
                        ->save($path . $fname, ['quality' => 100]);

                    $this->image = $fname;
                    if (!$this->save()) {
                        //print_r($model->getErrors());
                        return false;
                        exit;
                    }

                }

            }catch (Exception $e) {
                // print_r($e);exit;
                return false;
            }

            Yii::$app->session->setFlash('info-success','Новость успешно сохранена!');

            //Yii::$app->cache->delete('news');
            return true;
        }
        return false;

    }

    public function getGallery(){
        return $this->hasMany(NewsGallery::className(),['news_id'=>'id']);
    }

    // минимальный год
    public function getMinYear(){

        if($year = Yii::$app->cache->get('year') ){
            return $year;
        }

        if( $news = News::find()->where(['status' => 1 ])->orderBy('date')->limit(1)->one() ){
            $year = date('Y', $news->date);
            Yii::$app->cache->set('year',$year);
            return $year;
        }

    }

}
