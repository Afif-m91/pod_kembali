<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

/**
 * JabatanSeacrh represents the model behind the search form about `app\models\Provinsi`.
 */
class LaporanSearch extends Laporan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_awb'], 'integer'],
            [['penerima'], 'safe'],
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
        $query = Laporan::find();

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
            'kd_stt' => $this->kd_stt,
        ]);

        $query->orFilterWhere(['like', strtoupper('no_awb'),strtoupper($params['LaporanSearch']['cari'])]);
		 $query->orFilterWhere(['like', strtoupper('no_do'),strtoupper($params['LaporanSearch']['cari'])]);
		$query->orFilterWhere(['like', strtoupper('id_pengirim'),strtoupper($params['LaporanSearch']['cari'])]);
		
        return $dataProvider;
    }
	
}
