<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "career_main_list".
 *
 * @property integer $id
    
 * @property string $title_ru
    
 * @property string $title_uz
    
 * @property string $title_en
    
 * @property string $preview_img
    
 */
class CareerMainList extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'career_main_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_uz', 'title_en', 'preview_img'], 'string', 'max' => 255],
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
            'title_ru' => 'Заголовок Ru',
            'title_uz' => 'Заголовок Uz',
            'title_en' => 'Заголовок En',
            'preview_img' => 'Изображение превью',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = Yii::$app->security->generateRandomString(10) . '.' . $this->image->extension;

            if ($this->preview_img !== null && !empty($this->preview_img)) {
                unlink(Yii::getAlias('@frontend').'/web/uploads/career/main/' . $this->preview_img);
            }
            $this->preview_img = $name;
            $this->image->saveAs(Yii::getAlias('@frontend').'/web/uploads/career/main/' . $name);
            return true;
        } else {
            return false;
        }
    }
}
