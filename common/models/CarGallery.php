<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_gallery".
 *
 * @property int $id
 * @property int $car_id
 * @property string $image
 */
class CarGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id'], 'integer'],
            [['image'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car_id' => Yii::t('app', 'Car ID'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
