<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $title
 * @property string $descr
 * @property string $image
 * @property int $status
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'descr_ru'], 'required'],
            [['status','type'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'descr_ru', 'descr_uz', 'descr_en', 'link_ru', 'link_uz', 'link_en'], 'string', 'max' => 255 ],
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
            'title_ru' => 'Заголовок RU',
            'title_uz' => 'Заголовок UZ',
            'title_en' => 'Заголовок EN',
            'descr_ru' => 'Описание RU',
            'descr_uz' => 'Описание UZ',
            'descr_en' => 'Описание EN',
            'link_ru' => 'Ссылка',
            'link_uz' => 'Ссылка',
            'link_en' => 'Ссылка',
            'image' => 'Изображение',
            'status' => 'Статус',
        ];
    }

    public function updateModel( $new = false )
    {

        $post = Yii::$app->request->post();

        if( $this->load($post) ) {

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;
            }

            try {

                if ( $file = UploadedFile::getInstance($this, 'tmp_image') ) {

                    if ( ! preg_match('/image\//', $file->type) ) return false; // загружена не картинка!

                    $fname = time() . '.' . $file->extension;

                    $path = Yii::getAlias("@frontend/web/uploads/gallery/" . $this->id . '/');

                    if (!is_dir($path)) @mkdir($path);
                    if (!is_dir($path . 'thumb')) @mkdir($path . 'thumb');

                    // основная картинка - оригинал
                    $file->saveAs($path . $fname);

                    $filepath = $path . $fname;

                    // эскиз
                    Image::thumbnail($filepath, 292, 100)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                    // эскиз
                    Image::thumbnail($filepath, 1720, 800) //1140, 385
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

            }catch ( Exception $e) {
                print_r($e);
                exit;
            }

            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

}
