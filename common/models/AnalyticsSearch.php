<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Analytics;

/**
 * AnalyticsSearch represents the model behind the search form about `common\models\Analytics`.
 */
class AnalyticsSearch extends Analytics
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanalytics', 'iduser'], 'integer'],
            [['url', 'ip', 'session', 'browser', 'cdate', 'mdate'], 'safe'],
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
        $query = Analytics::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idanalytics' => $this->idanalytics,
            'iduser' => $this->iduser,
            'cdate' => $this->cdate,
            'mdate' => $this->mdate,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'session', $this->session])
            ->andFilterWhere(['like', 'browser', $this->browser]);

        return $dataProvider;
    }
}
