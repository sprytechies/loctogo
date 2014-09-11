<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Todo;

/**
 * TodoSearch represents the model behind the search form about `common\models\Todo`.
 */
class TodoSearch extends Todo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodo', 'idcities', 'iduser'], 'integer'],
            [['description', 'image', 'cdate', 'mdate'], 'safe'],
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
        $query = Todo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtodo' => $this->idtodo,
            'idcities' => $this->idcities,
            'iduser' => $this->iduser,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
