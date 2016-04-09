<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penjualan;

/**
 * PenjualanSearch represents the model behind the search form about `app\models\Penjualan`.
 */
class PenjualanSearch extends Penjualan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjual', 'idbayar'], 'integer'],
            [['produk', 'tgl_jual', 'tgl_kirim', 'jatuh_tempo', 'jam_kirim', 'cara_kirim', 'cara_bayar', 'status_del'], 'safe'],
            [['harga_total', 'karton', 'kilo'], 'number'],
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
        $query = Penjualan::find();

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
            'idjual' => $this->idjual,
            'idbayar' => $this->idbayar,
            'tgl_jual' => $this->tgl_jual,
            'tgl_kirim' => $this->tgl_kirim,
            'jatuh_tempo' => $this->jatuh_tempo,
            'jam_kirim' => $this->jam_kirim,
            'harga_total' => $this->harga_total,
            'karton' => $this->karton,
            'kilo' => $this->kilo,
        ]);

        $query->andFilterWhere(['like', 'produk', $this->produk])
            ->andFilterWhere(['like', 'cara_kirim', $this->cara_kirim])
            ->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'status_del', $this->status_del]);

        return $dataProvider;
    }
}
