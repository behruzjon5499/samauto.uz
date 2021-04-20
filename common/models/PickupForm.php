<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pickup_form".
 *
 * @property int $id
 * @property string $region
 * @property string $diller
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string|null $email
 * @property string $phone
 * @property string|null $check
 * @property string|null $check1
 *
 *
 * @property Regions $rid
 * @property Dillers $dil
 */
class PickupForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pickup_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region', 'diller', 'first_name', 'last_name', 'phone'], 'required'],
            [['region', 'diller', 'first_name', 'last_name', 'middle_name', 'email', 'phone', 'check', 'check1'], 'string', 'max' => 255],
            [['check','check1'], 'required'],
            [['check'], 'compare', 'compareValue' => 1, 'message'=>'Please check this'],
            [['check1'], 'compare', 'compareValue' => 1, 'message'=>'Please check this'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region' => Yii::t('app', 'Регион'),
            'diller' => Yii::t('app', 'Дилер'),
            'first_name' => Yii::t('app', 'Имя'),
            'last_name' => Yii::t('app', 'Фамилия'),
            'middle_name' => Yii::t('app', 'Отчество'),
            'email' => Yii::t('app', 'E-mail    '),
            'phone' => Yii::t('app', 'Телефон'),
            'check' => Yii::t('app', 'Соглашение о сотрудничестве'),
            'check1' => Yii::t('app', 'Соглашение о сотрудничестве'),
        ];
    }

    public function getRid()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region']);
    }
    public function getDil()
    {
        return $this->hasOne(Dillers::className(), ['id' => 'diller']);
    }
}
