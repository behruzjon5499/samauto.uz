<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "company_users".
 * @property int $id
 * @property int $company_id
 * @property int $parent_id для подчинения
 * @property int $doljnost_id должность
 * @property int $type тип пользователя 0-работник 5- менеджер 9-директор
 * @property int $status вкл или откл
 * @property string $name_ru
 * @property string $name_uz
 * @property string $name_en
 * @property string $phone
 * @property string $email
 * @property string $site
 * @property string $days
 * @property string $contacts
 * @property string $image
 * @property string $doljnost_ru
 */

class CompanyUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'parent_id', 'type', 'status'], 'integer'],
            [['name_ru', 'name_uz', 'name_en', 'doljnost_ru', 'doljnost_uz', 'doljnost_en', 'email', 'site'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 128],
            [['days_ru','days_uz','days_en', 'contacts'], 'string', 'max' => 512],
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
            'company_id' => 'В подчинении у',
            'parent_id' => 'Руководитель',
            'doljnost_id' => 'Должность',
            'doljnost_ru' => 'Должность RU',
            'doljnost_uz' => 'Должность UZ',
            'doljnost_en' => 'Должность EN',
            'type' => 'Должность',
            'status' => 'Статус',
            'name_ru' => 'Ф.И.О. Ru',
            'name_uz' => 'Ф.И.О. Uz',
            'name_en' => 'Ф.И.О. En',
            'phone' => 'Телефоны',
            'email' => 'Email',
            'site' => 'Сайт',
            'days_ru' => 'Дни приема',
            'days_uz' => 'Дни приема',
            'days_en' => 'Дни приема',
            'contacts' => 'Контакты',
            'image' => 'Image',
        ];
    }

    public function getDoljnost(){
        return $this->hasOne( Doljnost::className(),['id'=>'doljnost_id'] );

    }
    public function getWorkers(){
        return $this->hasMany( CompanyUsers::className(),['parent_id'=>'id'] )->where(['status'=>1]);

    }

    public function updateModel($new=false)
    {

        $post = Yii::$app->request->post();

        if( $this->load($post) ) {

            $parent_id = $this->parent_id;

            $children = CompanyUsers::find()->where(['parent_id' => $this->id])->all();

            if(count($children) > 0){
                $ids = [];
                foreach ($children as $child){
                    $ids[] = $child['id'];
                }
                if(in_array($parent_id, $ids)){
                    Yii::$app->session->setFlash('info', 'Действие не применимо! Выбранный сотрудник не может быть руководителем для этой должности');
                    return false;
                }
            }

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

                    $path = Yii::getAlias("@frontend/web/uploads/company-users/" . $this->id . '/');

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
