<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jenis;

/**
 * JenisSearch represents the model behind the search form about `app\models\Jenis`.
 */
class JenisSearch extends Jenis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjenis', 'rop'], 'integer'],
            [['namajenis'], 'safe'],
            [['stok_kilo', 'stok_karton'], 'number'],
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
        $query = Jenis::find();

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
            'idjenis' => $this->idjenis,
            'rop' => $this->rop,
            'stok_kilo' => $this->stok_kilo,
            'stok_karton' => $this->stok_karton,
        ]);

        $query->andFilterWhere(['like', 'namajenis', $this->namajenis]);

        return $dataProvider;
    }
}
