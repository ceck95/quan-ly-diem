<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T10:03:01+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T11:53:49+07:00

namespace common\modules\danhSachLop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HocSinhSearch represents the model behind the search form about `common\modules\danhSachLop\models\HocSinh`.
 */
class HocSinhSearch extends HocSinh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'created_by', 'updated_by', 'status'], 'integer'],
            [['ma_hoc_sinh', 'ho_ten', 'gioi_tinh', 'ngay_sinh', 'dan_toc', 'ton_giao', 'dia_chi', 'ma_phu_huynh', 'ma_lop', 'created_at', 'updated_at'], 'safe'],
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
            $query = HocSinh::find();
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ma_hoc_sinh', $this->ma_hoc_sinh])
            ->andFilterWhere(['like', 'ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 'gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 'ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 'dan_toc', $this->dan_toc])
            ->andFilterWhere(['like', 'ton_giao', $this->ton_giao])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'ma_phu_huynh', $this->ma_phu_huynh])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
