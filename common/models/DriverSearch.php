<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Driver;

/**
 * DriverSearch represents the model behind the search form about `common\models\Driver`.
 */
class DriverSearch extends Driver
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'experience_years', 'created_by', 'updated_by', 'status'], 'integer'],
            [['email', 'phone_number', 'first_name', 'last_name', 'display_name', 'date_of_birth', 'gender', 'avatar', 'driver_license_image_front', 'driver_license_image_back', 'driver_license_number', 'driver_license_type', 'driver_license_issue', 'driver_license_expiry', 'identity_number_image_front', 'identity_number_image_back', 'identity_number', 'identity_number_issue', 'bank_code', 'bank_account_number', 'bank_account_name', 'metadata', 'settings', 'created_at', 'updated_at', 'tsv'], 'safe'],
            [['rating', 'balance'], 'number'],
            [['is_verified'], 'boolean'],
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
        $query = Driver::find();
        $query->orderBy(['updated_at' => SORT_DESC]);

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
            'date_of_birth' => $this->date_of_birth,
            'driver_license_issue' => $this->driver_license_issue,
            'driver_license_expiry' => $this->driver_license_expiry,
            'identity_number_issue' => $this->identity_number_issue,
            'experience_years' => $this->experience_years,
            'rating' => $this->rating,
            'is_verified' => $this->is_verified,
            'balance' => $this->balance,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'display_name', $this->display_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'driver_license_image_front', $this->driver_license_image_front])
            ->andFilterWhere(['like', 'driver_license_image_back', $this->driver_license_image_back])
            ->andFilterWhere(['like', 'driver_license_number', $this->driver_license_number])
            ->andFilterWhere(['like', 'driver_license_type', $this->driver_license_type])
            ->andFilterWhere(['like', 'identity_number_image_front', $this->identity_number_image_front])
            ->andFilterWhere(['like', 'identity_number_image_back', $this->identity_number_image_back])
            ->andFilterWhere(['like', 'identity_number', $this->identity_number])
            ->andFilterWhere(['like', 'bank_code', $this->bank_code])
            ->andFilterWhere(['like', 'bank_account_number', $this->bank_account_number])
            ->andFilterWhere(['like', 'bank_account_name', $this->bank_account_name])
            ->andFilterWhere(['like', 'metadata', $this->metadata])
            ->andFilterWhere(['like', 'settings', $this->settings])
            ->andFilterWhere(['like', 'tsv', $this->tsv]);

        return $dataProvider;
    }
}
