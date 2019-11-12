<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_gallery".
 *
 * @property int $id
 * @property int $company_id
 * @property string $image
 */
class CompanyGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id'], 'integer'],
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
            'company_id' => 'Company ID',
            'image' => 'Image',
        ];
    }
}
