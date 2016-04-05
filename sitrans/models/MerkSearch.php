<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Merk;

/**
 * MerkSearch represents the model behind the search form about `app\models\Merk`.
 */
class MerkSearch extends Merk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmerk', 'idsupplier'], 'integer'],
            [['namasupplier', 'status'], 'safe'],
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
        $query = Merk::find();

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
            'idmerk' => $this->idmerk,
            'idsupplier' => $this->idsupplier,
        ]);

        $query->andFilterWhere(['like', 'namasupplier', $this->namasupplier])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
