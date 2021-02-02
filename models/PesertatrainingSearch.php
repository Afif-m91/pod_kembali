<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesertatraining;

/**
 * PesertatrainingSearch represents the model behind the search form about `app\models\Pesertatraining`.
 */
class PesertatrainingSearch extends Pesertatraining
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdPeserta', 'NamaPeserta', 'JenisKelamin', 'PekerjaanPeserta', 'TempatLahir', 'TanggalLahir', 'AlamatPeserta', 'KontakPeserta', 'EmailPeserta', 'NoIdentitas', 'NamaPerusahaan', 'AlamatPerusahaan', 'TrainingDate', 'TrainingEndDate'], 'safe'],
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
        $query = Pesertatraining::find();

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
            'TanggalLahir' => $this->TanggalLahir,
            'TrainingDate' => $this->TrainingDate,
            'TrainingEndDate' => $this->TrainingEndDate,
        ]);

		 $query->orFilterWhere(['like', 'KdPeserta', $params['PesertatrainingSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('PekerjaanPeserta'), strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('NamaPeserta'),  strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('JenisKelamin'),  strtoupper($params['PesertatrainingSearch']['cari'])])
			 ->orFilterWhere(['like', strtoupper('TempatLahir'), strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('AlamatPeserta'),  strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('KontakPeserta'),  strtoupper($params['PesertatrainingSearch']['cari'])])
			 ->orFilterWhere(['like', strtoupper('EmailPeserta'), strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('NoIdentitas'),  strtoupper($params['PesertatrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('NamaPerusahaan'),  strtoupper($params['PesertatrainingSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('AlamatPerusahaan'),  strtoupper($params['PesertatrainingSearch']['cari'])]);

        return $dataProvider;
    }
}
