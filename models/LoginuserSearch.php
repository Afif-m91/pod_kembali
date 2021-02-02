<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loginuser;

/**
 * LoginuserSearch represents the model behind the search form about `app\models\Loginuser`.
 */
class LoginuserSearch extends Loginuser
{
    /**
     * @inheritdoc
     */
	 public $cari;
    public function rules()
    {
        return [
            [['kd_user', 'kd_pegawai', 'password', 'status_user'], 'safe'],
            [['kd_akses_level'], 'string'],
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
        $query = Loginuser::find();

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
            'kd_akses_level' => $this->kd_akses_level,
        ]);

        $query->orFilterWhere(['like', 'kd_user',strtoupper($params['LoginuserSearch']['cari'])])
            ->orFilterWhere(['like', 'kd_pegawai', strtoupper($params['LoginuserSearch']['cari'])])
            ->orFilterWhere(['like', 'password', strtoupper($params['LoginuserSearch']['cari'])])
            ->orFilterWhere(['like', 'status_user', strtoupper($params['LoginuserSearch']['cari'])]);

        return $dataProvider;
    }
}
