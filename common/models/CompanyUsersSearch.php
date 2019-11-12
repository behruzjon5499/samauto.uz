<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyUsers;
use common\helpers\OptionsHelper;

/**
 * CompanyUsersSearch represents the model behind the search form of `common\models\CompanyUsers`.
 */
class CompanyUsersSearch extends CompanyUsers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'parent_id', 'type', 'status'], 'integer'],
            [['name_ru', 'name_uz', 'name_en', 'phone', 'email', 'site', 'days_ru','days_uz','days_en', 'contacts', 'image','doljnost_ru'], 'safe'],
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

        //echo $params['type']; exit;

       // $type = isset($params['type']) && $params['type']=='directors' ? 1 : 0;

        $query = CompanyUsers::find()->where(['type'=>$params['type']]);

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
            'company_id' => $this->company_id,
            'parent_id' => $this->parent_id,
            'type' => $this->type,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'doljnost_ru', $this->doljnost_ru])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site', $this->site])
            //->andFilterWhere(['like', 'days_', $this->days_])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
