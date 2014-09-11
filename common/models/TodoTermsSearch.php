<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TodoTerms;

/**
 * TodoTermsSearch represents the model behind the search form about `common\models\TodoTerms`.
 */
class TodoTermsSearch extends TodoTerms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodo_terms', 'idtodo', 'idterms'], 'integer'],
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
        $query = TodoTerms::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtodo_terms' => $this->idtodo_terms,
            'idtodo' => $this->idtodo,
            'idterms' => $this->idterms,
        ]);

        return $dataProvider;
    }
}
