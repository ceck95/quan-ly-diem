<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:44:39+07:00

namespace common\modules\bangDiem\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BangDiemCuoiKiSearch represents the model behind the search form about `common\modules\bangDiem\models\BangDiemCuoiKi`.
 */
class BangDiemCuoiKiSearch extends BangDiemCuoiKi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'created_by', 'updated_by', 'status'], 'integer'],
            [['ma_hoc_sinh', 'ten_hoc_sinh', 'ten_lop', 'ten_mon', 'ma_lop', 'ma_mon', 'created_at', 'updated_at'], 'safe'],
            [['kiem_tra_mieng', 'kiem_tra_15_phut', 'kiem_tra_1_tiet', 'thi', 'diem_trung_binh'], 'number'],
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
            $query = BangDiemCuoiKi::find();
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
            'kiem_tra_mieng' => $this->kiem_tra_mieng,
            'kiem_tra_15_phut' => $this->kiem_tra_15_phut,
            'kiem_tra_1_tiet' => $this->kiem_tra_1_tiet,
            'thi' => $this->thi,
            'diem_trung_binh' => $this->diem_trung_binh,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ma_hoc_sinh', $this->ma_hoc_sinh])
            ->andFilterWhere(['like', 'ma_lop', $this->ma_lop]);

        return $dataProvider;
    }
}
