<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NhanVien;

/**
 * NhanVienSearch represents the model behind the search form about `common\models\NhanVien`.
 */
class NhanVienSearch extends NhanVien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'role_id', 'created_by', 'updated_by', 'status'], 'integer'],
            [['ma_nhan_vien', 'ten_nhan_vien', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'email', 'sdt', 'created_at', 'updated_at'], 'safe'],
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
        $query = NhanVien::find();

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

        $query->andFilterWhere(['like', 'ma_nhan_vien', $this->ma_nhan_vien])
            ->andFilterWhere(['like', 'ten_nhan_vien', $this->ten_nhan_vien])
            ->andFilterWhere(['like', 'gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 'ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
