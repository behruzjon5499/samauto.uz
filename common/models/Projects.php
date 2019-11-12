<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property int $date
 * @property string $title
 * @property string $text
 * @property string $image
 * @property int $status
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'status','top'], 'integer'],
            //[['text'], 'required'],
            [['text_ru','text_uz','text_en'], 'string'],
            [['title_ru','title_uz','title_en','link_ru','link_uz','link_en'], 'string', 'max' => 255],
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
            'date' => 'Date',
            'top' => 'В топе',
            'link_ru' => 'Ссылка RU',
            'link_uz' => 'Ссылка UZ',
            'link_en' => 'Ссылка EN',
            'title_ru' => 'Название RU',
            'text_ru' => 'Текст RU',
            'title_uz' => 'Название UZ',
            'text_uz' => 'Текст UZ',
            'title_en' => 'Название EN',
            'text_en' => 'Текст EN',
            'image' => 'Изображение',
            'status' => 'Статус',
        ];
    }
    // галерея изображений
    public function getGallery()
    {
        return $this->hasMany(ProjectsGallery::className(), ['project_id' => 'id']);
    }

}
