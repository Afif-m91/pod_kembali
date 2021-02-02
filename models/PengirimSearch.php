<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengirim;

/**
 * BeritaSearch represents the model behind the search form about `app\models\Pengirim`.
 */
class PengirimSearch extends Pengirim
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_pengirim','id_pengirim', 'nama_pengirim','alamat_pengirim', 'no_hp','kd_user','tgl_pengiriman'], 'safe'],
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
        $query = Pengirim::find();

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
            'tgl_pengiriman' => $this->tgl_pengiriman,
        ]);

        $query->orFilterWhere(['like', strtoupper('kd_pengirim'),strtoupper($params['PengirimSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('id_pengirim'),strtoupper($params['PengirimSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('nama_pengirim'),strtoupper($params['PengirimSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('alamat_pengirim'), strtoupper($params['PengirimSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('no_hp'), strtoupper($params['PengirimSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('kd_user'), strtoupper($params['PengirimSearch']['cari'])]);

        return $dataProvider;
    }
}
