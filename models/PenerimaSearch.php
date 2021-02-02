<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penerima;

/**
 * PenerimaSearch represents the model behind the search form about `app\models\Penerima`.
 */
class PenerimaSearch extends Penerima
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_penerima', 'nama_penerima', 'alamat_penerima','no_hp','tgl_penerima'], 'safe'],
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
        $query = Penerima::find();

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
            'kd_penerima' => $this->kd_penerima,
			 ]);
		$query->orFilterWhere(['like', strtoupper('nama_penerima'),strtoupper($params['PenerimaSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('alamat_penerima'),strtoupper($params['PenerimaSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('no_hp'),strtoupper($params['PenerimaSearch']['cari'])])
			  ->orFilterWhere(['like', strtoupper('tgl_penerima'),strtoupper($params['PenerimaSearch']['cari'])]);

        return $dataProvider;
    }
}
