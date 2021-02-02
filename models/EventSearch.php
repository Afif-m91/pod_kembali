<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * BeritaSearch represents the model behind the search form about `app\models\Berita`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_event', 'judul_event','gambar', 'isi_event','tgl_update', 'kd_user'], 'safe'],
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
        $query = Event::find();

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

        $query->orFilterWhere(['like', strtoupper('kd_event'),strtoupper($params['EventSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('judul_event'),strtoupper($params['EventSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('gambar'), strtoupper($params['EventSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('isi_event'), strtoupper($params['EventSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('kd_user'), strtoupper($params['EventSearch']['cari'])]);

        return $dataProvider;
    }
}
