<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Podkembali;

/**
 * PegawaiSearch represents the model behind the search form about `app\models\Podkembali`.
 */
class PodkembaliSearch extends Podkembali
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_stt', 'no_awb', 'no_do', 'cart_id', 'id_pengirim','penerima', 'alamat_penerima', 'kota', 'kilo', 'koli', 'tgl_kirim', 'tgl_terima', 'nama_penerima', 'jenis_barang','remarks','keterangan'], 'safe'],
                 
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
        $query = Podkembali::find();

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
          
            'tgl_kirim' => $this->tgl_kirim,
        ]);
        $query->orFilterWhere(['like', 'no_awb', $params['PodkembaliSearch']['cari'] ])
            ->orFilterWhere(['like', 'no_do', $params['PodkembaliSearch']['cari'] ])
			  ->orFilterWhere(['like', 'id_pengirim', $params['PodkembaliSearch']['cari'] ])
			  ->orFilterWhere(['like', 'status', $params['PodkembaliSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('cart_id'),  strtoupper($params['PodkembaliSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('kota'),  strtoupper($params['PodkembaliSearch']['cari'])])
            ->orFilterWhere(['like', 'kilo',  $params['PodkembaliSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('alamat_penerima'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('penerima'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('tgl_kirim'),  strtoupper($params['PegawaiSearch']['cari'])]);

        return $dataProvider;
    }
}
