<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Galleri;

/**
 * BeritaSearch represents the model behind the search form about `app\models\Berita`.
 */
class GalleriSearch extends Galleri
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_galeri', 'gambar1','gambar2', 'gambar3','gambar4','gambar5', 'tgl_update','kd_user'], 'safe'],
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
        $query = Galleri::find();

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

        $query->orFilterWhere(['like', strtoupper('kd_galeri'),strtoupper($params['GalleriSearch']['cari'])])
           // ->orFilterWhere(['like', strtoupper('kd_unique'),strtoupper($params['GalleriSearch']['cari'])])
			 ->orFilterWhere(['like', strtoupper('nama_folder'),strtoupper($params['GalleriSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('gambar1'), strtoupper($params['GalleriSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('gambar2'), strtoupper($params['GalleriSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('gambar3'), strtoupper($params['GalleriSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('gambar4'), strtoupper($params['GalleriSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('gambar5'), strtoupper($params['GalleriSearch']['cari'])])
			->orFilterWhere(['like', strtoupper('tgl_update'), strtoupper($params['GalleriSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('kd_user'), strtoupper($params['GalleriSearch']['cari'])]);

        return $dataProvider;
    }
}
