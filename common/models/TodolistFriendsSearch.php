<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TodolistFriends;

/**
 * TodolistFriendsSearch represents the model behind the search form about `common\models\TodolistFriends`.
 */
class TodolistFriendsSearch extends TodolistFriends
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtodolist_friends', 'idtodolist', 'iduser', 'idfriends'], 'integer'],
            [['cdate', 'mdate'], 'safe'],
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
        $query = TodolistFriends::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idtodolist_friends' => $this->idtodolist_friends,
            'idtodolist' => $this->idtodolist,
            'iduser' => $this->iduser,
            'idfriends' => $this->idfriends,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        return $dataProvider;
    }
}
