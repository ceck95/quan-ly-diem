<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T10:03:01+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:57:05+07:00

namespace common\modules\bangDiem\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BangDiemTongKetSearch represents the model behind the search form about `common\modules\bangDiem\models\BangDiemTongKet`.
 */
class BangDiemTongKetSearch extends BangDiemTongKet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'created_by', 'updated_by', 'status'], 'integer'],
            [['ma_hoc_sinh', 'ten_lop', 'ten_hoc_sinh', 'ma_lop', 'loai_hanh_kiem', 'xep_loai', 'created_at', 'updated_at'], 'safe'],
            [['diem_trung_binh_hk1', 'diem_trung_binh_hk2', 'diem_trung_binh_ca_nam'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $queryData = null)
    {
        if (isset($queryData)) {
            $query = $queryData;
        } else {
            $query = BangDiemTongKet::find();
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'uid' => $this->uid,
            'diem_trung_binh_hk1' => $this->diem_trung_binh_hk1,
            'diem_trung_binh_hk2' => $this->diem_trung_binh_hk2,
            'diem_trung_binh_ca_nam' => $this->diem_trung_binh_ca_nam,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ma_hoc_sinh', $this->ma_hoc_sinh])
            ->andFilterWhere(['like', 'ma_lop', $this->ma_lop])
            ->andFilterWhere(['like', 'loai_hanh_kiem', $this->loai_hanh_kiem])
            ->andFilterWhere(['like', 'xep_loai', $this->xep_loai]);

        return $dataProvider;
    }
}
