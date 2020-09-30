<?php

namespace common\models;

use Yii;
use common\helpers\TextHelper;
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "vacancy_send".
 *
 * @property integer $id
    
 * @property integer $vacancy_id
    
 * @property string $friend_email
    
 * @property integer $status
    
 *
 * @property Vacancy $vacancy
 */
class VacancySend extends \yii\db\ActiveRecord
{
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;
    private $email;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy_send';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'friend_email'], 'required'],
            [['vacancy_id', 'status'], 'integer'],
            [['friend_email'], 'string', 'max' => 100],
            [['friend_email'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID'),
            'friend_email' => Yii::t('app', 'Friend Email'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
    }


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

                        if(isset($this->link)){
                if( $this->link == '' || isset($post['VacancySend']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['VacancySend']['title'] );
                }
            }

            
            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }


            
            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }
    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

}
