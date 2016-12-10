<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-26T14:35:27+07:00

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GiaoVienSearch represents the model behind the search form about `common\models\GiaoVien`.
 */
class GiaoVienSearch extends GiaoVien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'role_id', 'created_by', 'updated_by', 'status'], 'integer'],
            [['ma_giao_vien', 'ten_giao_vien', 'gioi_tinh', 'sdt', 'ma_lop_chu_nhiem', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params)
    {
        $query = GiaoVien::find();

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
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ma_giao_vien', $this->ma_giao_vien])
            ->andFilterWhere(['like', 'ten_giao_vien', $this->ten_giao_vien])
            ->andFilterWhere(['like', 'gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 'sdt', $this->sdt])
            ->andFilterWhere(['like', 'ma_lop_giang_day', $this->ma_lop_giang_day])
            ->andFilterWhere(['like', 'ma_lop_chu_nhiem', $this->ma_lop_chu_nhiem]);

        return $dataProvider;
    }
}
