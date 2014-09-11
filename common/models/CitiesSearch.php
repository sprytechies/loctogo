<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cities;

/**
 * CitiesSearch represents the model behind the search form about `common\models\Cities`.
 */
class CitiesSearch extends Cities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcities', 'idstates'], 'integer'],
            [['name', 'longitude', 'latitude', 'wikilink'], 'safe'],
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
        $query = Cities::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcities' => $this->idcities,
            'idstates' => $this->idstates,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'wikilink', $this->wikilink]);

        return $dataProvider;
    }
}
