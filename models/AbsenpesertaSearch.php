<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absenpeserta;

/**
 * AbsenpesertaSearch represents the model behind the search form about `app\models\Absenpeserta`.
 */
class AbsenpesertaSearch extends Absenpeserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdAbsen'], 'integer'],
            [['KdPeserta', 'KdMapping', 'TanggalAbsen', 'JamAbsen'], 'safe'],
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
        $query = Absenpeserta::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'KdAbsen' => $this->KdAbsen,
            //'TanggalAbsen' => $this->TanggalAbsen,
            'JamAbsen' => $this->JamAbsen,
        ]);

        $query->orFilterWhere(['like', strtoupper('KdPeserta'),strtoupper($params['AbsenpesertaSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('TanggalAbsen'),strtoupper($params['AbsenpesertaSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('KdMapping'),strtoupper($params['AbsenpesertaSearch']['cari'])]);

        return $dataProvider;
    }
}
