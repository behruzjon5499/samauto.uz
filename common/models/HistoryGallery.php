<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "history_gallery".
 *
 * @property int $id
 * @property int $history_id
 * @property string $image
 */
class HistoryGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['history_id'], 'integer'],
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
            'history_id' => 'История',
            'image' => 'Фото',
        ];
    }

}
