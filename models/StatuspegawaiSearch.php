<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Statuspegawai;

/**
 * StatuspegawaiSearch represents the model behind the search form about `app\models\Statuspegawai`.
 */
class StatuspegawaiSearch extends Statuspegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_status'], 'integer'],
            [['nama_status'], 'safe'],
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
        $query = Statuspegawai::find();

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
            'kd_status' => $this->kd_status,
        ]);

        $query->andFilterWhere(['like', strtoupper('nama_status'), strtoupper($params['StatuspegawaiSearch']['cari'])]);

        return $dataProvider;
    }
}
