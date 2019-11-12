<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DillersOffice;
use common\helpers\OptionsHelper;

/**
 * DillersOfficeSearch represents the model behind the search form about `common\models\DillersOffice`.
 */
class DillersOfficeSearch extends DillersOffice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','diller_id'], 'integer'],
            [['title_ru', 'title_uz', 'title_en', 'username_ru', 'username_uz', 'username_en', 'doljnost_ru', 'doljnost_uz', 'doljnost_en', 'phone', 'text_ru', 'text_uz', 'text_en', 'phones', 'fax', 'email', 'site', 'lat', 'lon'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DillersOffice::find()->where(['diller_id'=>$params['diller_id']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => OptionsHelper::getRowsCount(),
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'status' => $this->status,
            'diller_id' => $this->diller_id,

        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'username_ru', $this->username_ru])
            ->andFilterWhere(['like', 'username_uz', $this->username_uz])
            ->andFilterWhere(['like', 'username_en', $this->username_en])
            ->andFilterWhere(['like', 'doljnost_ru', $this->doljnost_ru])
            ->andFilterWhere(['like', 'doljnost_uz', $this->doljnost_uz])
            ->andFilterWhere(['like', 'doljnost_en', $this->doljnost_en])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'text_ru', $this->text_ru])
            ->andFilterWhere(['like', 'text_uz', $this->text_uz])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'phones', $this->phones])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lon', $this->lon]);

        return $dataProvider;
    }
}
