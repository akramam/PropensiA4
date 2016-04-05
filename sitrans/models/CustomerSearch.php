<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcustomer'], 'integer'],
            [['namacustomer', 'telponcustomer', 'alamatcustomer'], 'safe'],
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
        $query = Customer::find();

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
            'idcustomer' => $this->idcustomer,
        ]);

        $query->andFilterWhere(['like', 'namacustomer', $this->namacustomer])
            ->andFilterWhere(['like', 'telponcustomer', $this->telponcustomer])
            ->andFilterWhere(['like', 'alamatcustomer', $this->alamatcustomer]);

        return $dataProvider;
    }
}
