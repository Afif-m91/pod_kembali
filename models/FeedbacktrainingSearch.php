<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedbacktraining;

/**
 * FeedbacktrainingSearch represents the model behind the search form about `app\models\Feedbacktraining`.
 */
class FeedbacktrainingSearch extends Feedbacktraining
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdFeedbackTraining', 'KdMapping', 'KdPeserta', 'TanggalIsi', 'Jam'], 'safe'],
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
        $query = Feedbacktraining::find();

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
            'TanggalIsi' => $this->TanggalIsi,
            'Jam' => $this->Jam,
        ]);

        $query->orFilterWhere(['like', strtoupper('KdFeedbackTraining'), strtoupper($params['FeedbacktrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('KdMapping'),strtoupper($params['FeedbacktrainingSearch']['cari'])])
            ->orFilterWhere(['like', strtoupper('KdPeserta'),strtoupper($params['FeedbacktrainingSearch']['cari'])]);

        return $dataProvider;
    }
}
