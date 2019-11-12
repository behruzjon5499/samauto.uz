<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transport;
use common\helpers\OptionsHelper;


/**
 * TransportSearch represents the model behind the search form about `common\models\Transport`.
 */
class TransportSearch extends Transport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id','pos'], 'integer'],
            [['status', 'type', 'type_id', 'model', 'title_ru', 'title_uz', 'title_en', 'file_title_ru','file_title_uz','file_title_en', 'image', 'data'], 'safe'],
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
        $query = Transport::find();

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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'pos' => $this->pos,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'type_id', $this->type_id])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'file_title_ru', $this->file_title_ru])
            ->andFilterWhere(['like', 'file_title_uz', $this->file_title_uz])
            ->andFilterWhere(['like', 'file_title_en', $this->file_title_en])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
