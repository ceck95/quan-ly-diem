<?php

namespace common\modules\danhSachLop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LopSearch represents the model behind the search form about `common\modules\danhSachLop\models\Lop`.
 */
class LopSearch extends Lop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'so_hoc_sinh', 'khoi', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ma_lop', 'ten', 'created_at', 'updated_at'], 'safe'],
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
        $query = Lop::find();

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
            'so_hoc_sinh' => $this->so_hoc_sinh,
            'khoi' => $this->khoi,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'ma_lop', $this->ma_lop])
            ->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }
}
