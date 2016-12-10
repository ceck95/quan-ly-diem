<?php

namespace common\modules\danhSachLop\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\danhSachLop\models\MonHoc;

/**
 * MonHocSearch represents the model behind the search form about `common\modules\danhSachLop\models\MonHoc`.
 */
class MonHocSearch extends MonHoc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'he_so_mon', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ma_mon_hoc', 'ten_mon_hoc', 'created_at', 'updated_at'], 'safe'],
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
        $query = MonHoc::find();

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
            'he_so_mon' => $this->he_so_mon,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'ma_mon_hoc', $this->ma_mon_hoc])
            ->andFilterWhere(['like', 'ten_mon_hoc', $this->ten_mon_hoc]);

        return $dataProvider;
    }
}
