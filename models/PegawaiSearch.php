<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form about `app\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_pegawai', 'NIK_pegawai', 'nama_pegawai', 'jenis_kelamin', 'no_identitas', 'alamat', 'no_hp', 'email', 'tempat_lahir', 'tgl_lahir', 'foto'], 'safe'],
            [['kd_status', 'kd_jabatan'], 'integer'],
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
        $query = Pegawai::find();

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
            'kd_jabatan' => $this->kd_jabatan,
            'tgl_lahir' => $this->tgl_lahir,
        ]);
        $query->orFilterWhere(['like', 'kd_pegawai', $params['PegawaiSearch']['cari'] ])
            ->orFilterWhere(['like', 'NIK_pegawai', $params['PegawaiSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('nama_pegawai'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('jenis_kelamin'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', 'no_identitas',  $params['PegawaiSearch']['cari'] ])
            ->orFilterWhere(['like', strtoupper('alamat'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('email'),  strtoupper($params['PegawaiSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('tempat_lahir'),  strtoupper($params['PegawaiSearch']['cari'])]);

        return $dataProvider;
    }
}
