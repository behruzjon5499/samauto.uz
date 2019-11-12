<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "missions".
 *
 * @property int $id
 * @property string $num
 * @property string $title_ru
 * @property string $title_uz
 * @property string $title_en
 * @property string $image
 * @property string $data инфо о мисии
 */
class Missions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'missions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data','file'], 'string'],
            [['num'], 'string', 'max' => 4],
            [['title_ru', 'title_uz', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'num' => Yii::t('app', 'Номер'),
            'title_ru' => Yii::t('app', 'Заголовок Ru'),
            'title_uz' => Yii::t('app', 'Заголовок Uz'),
            'title_en' => Yii::t('app', 'Заголовок En'),
            'data' => Yii::t('app', 'Данные'),
            'file' => Yii::t('app', 'Фото'),
        ];
    }

}
