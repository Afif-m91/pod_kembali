<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mappingkelas;

/**
 * MappingkelasSearch represents the model behind the search form about `app\models\Mappingkelas`.
 */
class MappingkelasSearch extends Mappingkelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdMapping', 'KdPegawai', 'KdRuangan', 'KdMateri', 'TanggalMulai', 'TanggalSelesai', 'Keterangan'], 'safe'],
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
        $query = Mappingkelas::find();

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
            'TanggalMulai' => $this->TanggalMulai,
            'TanggalSelesai' => $this->TanggalSelesai,
        ]);

        $query->orFilterWhere(['like', 'KdPegawai', $params['MappingkelasSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('KdMapping'),  strtoupper($params['MappingkelasSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('KdRuangan'),  strtoupper($params['MappingkelasSearch']['cari'])])
            ->orFilterWhere(['like', 'KdMateri',  $params['MappingkelasSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('Keterangan'),  strtoupper($params['MappingkelasSearch']['cari'])]);

        return $dataProvider;
    }
}
