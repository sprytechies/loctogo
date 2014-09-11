<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Todolist;

/**
 * TodolistSearch represents the model behind the search form about `common\models\Todolist`.
 */
class TodolistSearch extends Todolist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodolist', 'idtodo', 'iduser'], 'integer'],
            [['name', 'reminder', 'cdate', 'mdate'], 'safe'],
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
        $query = Todolist::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtodolist' => $this->idtodolist,
            'idtodo' => $this->idtodo,
            'iduser' => $this->iduser,
            'reminder' => $this->reminder,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
