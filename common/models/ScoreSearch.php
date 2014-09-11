<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Score;

/**
 * ScoreSearch represents the model behind the search form about `common\models\Score`.
 */
class ScoreSearch extends Score
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idscore', 'type', 'iduser', 'value', 'idtodo', 'idcomment'], 'integer'],
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
        $query = Score::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idscore' => $this->idscore,
            'type' => $this->type,
            'iduser' => $this->iduser,
            'value' => $this->value,
            'idtodo' => $this->idtodo,
            'idcomment' => $this->idcomment,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        return $dataProvider;
    }
}
