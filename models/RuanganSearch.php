<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ruangan;

/**
 * RuanganSearch represents the model behind the search form about `app\models\Ruangan`.
 */
class RuanganSearch extends Ruangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdRuangan', 'NamaRuangan', 'Gedung', 'Alamat'], 'safe'],
            [['Lantai', 'Kapasitas'], 'integer'],
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
        $query = Ruangan::find();

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
            'Lantai' => $this->Lantai,
        ]);

		$query->orFilterWhere(['like', strtoupper('KdRuangan'),strtoupper($params['RuanganSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('NamaRuangan'),strtoupper($params['RuanganSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('Alamat'),strtoupper($params['RuanganSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('Kapasitas'),strtoupper($params['RuanganSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('Gedung'),strtoupper($params['RuanganSearch']['cari'])]);

        return $dataProvider;
    }
}
