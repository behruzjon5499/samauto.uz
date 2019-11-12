<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NewsGallery;
use common\helpers\OptionsHelper;


/**
 * NewsGallerySearch represents the model behind the search form about `common\models\NewsGallery`.
 */
class NewsGallerySearch extends NewsGallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'news_id'], 'integer'],
            [['type', 'image'], 'safe'],
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
        $query = NewsGallery::find()->where(['news_id'=>$params['id']]);

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
            'news_id' => $this->news_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
