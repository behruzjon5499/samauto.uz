<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $image
 * @property string $title_ru
 * @property string $link_ru
 * @property string $title_uz
 * @property string $link_uz
 * @property string $title_en
 * @property string $link_en
 */
class CategoriesParts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories_parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['image'], 'string', 'max' => 16],
            [['title_ru', 'link_ru','title_uz', 'link_uz','title_en', 'link_en'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'image' => 'Image',
            'title_ru' => 'Заголовок RU',
            'link_ru' => 'Ссылка',
            'title_uz' => 'Заголовок UZ',
            'link_uz' => 'Ссылка',
            'title_en' => 'Заголовок EN',
            'link_en' => 'Ссылка',
        ];
    }

    // получаем все подкатегории
    public function getSubCategories(){

        return $this->hasMany( CategoriesParts::className(), [ 'parent_id' => 'id' ] );

    }

    // получаем родителя категории
    public function getParent(){

        return $this->hasOne( CategoriesParts::className(), [ 'id' => 'parent_id' ] ); //->with('parent');

    }

    // получение id по ссылке
    public function getId($link){
        return CategoriesParts::find()->select('id')->where(['link'=>$link])->one()->id;
    }

    // получение категории по ссылке
    public static function getCatByLink($link){
        return CategoriesParts::find()->where(['link'=>$link])->one();
    }


}
