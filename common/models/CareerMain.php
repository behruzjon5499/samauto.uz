<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "career_main".
 *
 * @property integer $id
    
 * @property string $main_img
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 */
class CareerMain extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'career_main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_img', 'title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, bmp']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_img' => 'Основное изображение',
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = Yii::$app->security->generateRandomString(10) . '.' . $this->image->extension;

            if ($this->main_img !== null && !empty($this->main_img)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/career/main/' . $this->main_img);
            }
            $this->main_img = $name;
            $this->image->saveAs(Yii::getAlias('@frontend').'/web/uploads/career/main/' . $name);
            return true;
        } else {
            return false;
        }
    }

}
