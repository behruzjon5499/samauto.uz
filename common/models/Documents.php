<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property int $type тип 0-фото 1-файл
 * @property int $status
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $file
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'integer'],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['file'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'status' => 'Статус',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'file' => 'Файл',
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
            //$this->title_ru = TextHelper::Transliterate( $post['Documents']['title_ru'] );
            //$this->title_uz = TextHelper::Transliterate( $post['Documents']['title_uz'] );
            //$this->title_en = TextHelper::Transliterate( $post['Documents']['title_en'] );
            //}

            //print_r($post); exit;

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }

            try {

                if ($file = UploadedFile::getInstance($this, 'tmp_image')) {

                    if (!preg_match('/image\//', $file->type)) return false; // загружена не картинка!


                    if($this->file == '') {
                        $fname = time() . '.' . $file->extension;
                    }else{
                        $fname = $this->file;
                    }

                    $path = Yii::getAlias("@frontend/web/uploads/documents/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname); // оригинальный
                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 200, 300)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    $this->file = $fname;
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
}
