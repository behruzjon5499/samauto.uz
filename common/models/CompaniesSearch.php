<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Companies;
use common\helpers\OptionsHelper;


/**
 * CompaniesSearch represents the model behind the search form of `common\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name_ru', 'name_uz', 'name_en', 'text_ru', 'text_uz', 'text_en','days_ru', 'days_uz', 'days_en', 'address_ru', 'address_uz', 'address_en', 'doljnost_ru', 'doljnost_uz', 'doljnost_en', 'phone', 'email','site', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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

        $type = isset($params['type']) ? (int)$params['type'] : 0;

        $query = Companies::find()->where(['type'=>$type]);

        // add conditions that should always apply here

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'text_ru', $this->text_ru])
            ->andFilterWhere(['like', 'text_uz', $this->text_uz])
            ->andFilterWhere(['like', 'text_en', $this->text_en])
            ->andFilterWhere(['like', 'days_ru', $this->days_ru])
            ->andFilterWhere(['like', 'days_uz', $this->days_uz])
            ->andFilterWhere(['like', 'days_en', $this->days_en])
            ->andFilterWhere(['like', 'address_ru', $this->address_ru])
            ->andFilterWhere(['like', 'address_uz', $this->address_uz])
            ->andFilterWhere(['like', 'address_en', $this->address_en])
            ->andFilterWhere(['like', 'doljnost_ru', $this->doljnost_ru])
            ->andFilterWhere(['like', 'doljnost_uz', $this->doljnost_uz])
            ->andFilterWhere(['like', 'doljnost_en', $this->doljnost_en])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
