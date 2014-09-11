<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Friends;

/**
 * FriendsSearch represents the model behind the search form about `common\models\Friends`.
 */
class FriendsSearch extends Friends
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfriends', 'iduser', 'idfriend'], 'integer'],
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
        $query = Friends::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idfriends' => $this->idfriends,
            'iduser' => $this->iduser,
            'idfriend' => $this->idfriend,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        return $dataProvider;
    }
}
