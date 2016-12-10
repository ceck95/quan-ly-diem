<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhuHuynh;

/**
 * PhuHuynhSearch represents the model behind the search form about `common\models\PhuHuynh`.
 */
class PhuHuynhSearch extends PhuHuynh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'role_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ma_phu_huynh', 'ten_phu_huynh', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'cmnd', 'email', 'sdt', 'created_at', 'updated_at'], 'safe'],
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
        $query = PhuHuynh::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'ma_phu_huynh', $this->ma_phu_huynh])
            ->andFilterWhere(['like', 'ten_phu_huynh', $this->ten_phu_huynh])
            ->andFilterWhere(['like', 'gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 'ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'cmnd', $this->cmnd])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
