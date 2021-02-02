<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Klien;

/**
 * BeritaSearch represents the model behind the search form about `app\models\Berita`.
 */
class KlienSearch extends Klien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_klien', 'nama_klien','alamat_klien', 'no_hp','gambar','tgl_update', 'kd_user'], 'safe'],
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
        $query = Klien::find();

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
            'tgl_update' => $this->tgl_update,
        ]);

        $query->orFilterWhere(['like', strtoupper('kd_klien'),strtoupper($params['KlienSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('nama_klien'),strtoupper($params['KlienSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('alamat_klien'), strtoupper($params['KlienSearch']['cari'])])
			 ->orFilterWhere(['like', strtoupper('no_hp'), strtoupper($params['KlienSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('gambar'), strtoupper($params['KlienSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('kd_user'), strtoupper($params['KlienSearch']['cari'])]);

        return $dataProvider;
    }
}
