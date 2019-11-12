<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property string $id
 * @property integer $region_id
 * @property string $name
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['name'], 'string', 'max' => 24]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Страна',
            'name' => 'Название',
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }



}
