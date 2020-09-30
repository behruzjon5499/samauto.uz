<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VacancyCategory;

/**
 * VacancyCategorySearch represents the model behind the search form about `common\models\VacancyCategory`.
 */
class VacancyRequestSearch extends VacancyRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vacancy_id'], 'integer'],
            [['firstname', 'secondname', 'thirdname', 'phone', 'email', 'status'], 'safe'],
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
        $query = VacancyRequest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'secondname', $this->secondname])
            ->andFilterWhere(['like', 'thirdname', $this->thirdname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'vacancy_id', $this->vacancy_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
