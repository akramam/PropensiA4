<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produk;

/**
 * ProdukSearch represents the model behind the search form about `app\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmerk', 'idsupplier', 'idjenis', 'harga_beli', 'harga_jual'], 'integer'],
            [['lokasi', 'namaproduk'], 'safe'],
            [['kilo', 'karton'], 'number'],
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
        $query = Produk::find();

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
            'idjenis' => $this->idjenis,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'kilo' => $this->kilo,
            'karton' => $this->karton,
        ]);

        $query->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'namaproduk', $this->namaproduk]);

        return $dataProvider;
    }
}
