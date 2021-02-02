<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedbackform;

/**
 * FeedbackformSearch represents the model behind the search form about `app\models\Feedbackform`.
 */
class FeedbackformSearch extends Feedbackform
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdFeedback', 'DeskripsiFeedback', 'Keterangan'], 'safe'],
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
        $query = Feedbackform::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
			 $query->orFilterWhere(['like', strtoupper('DeskripsiFeedback'),strtoupper($params['FeedbackformSearch']['cari'])])
				   ->orFilterWhere(['like', strtoupper('Keterangan'),strtoupper($params['FeedbackformSearch']['cari'])]);

        return $dataProvider;
    }
}
