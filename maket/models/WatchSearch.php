<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Watch;

/**
 * WatchSearch represents the model behind the search form of `app\models\Watch`.
 */
class WatchSearch extends Watch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'pulse', 'nfc', 'brand_id', 'charging_id', 'system_id', 'mic', 'display', 'type_id', 'calories', 'sleep', 'moisture', 'weather'], 'integer'],
            [['title', 'img', 'description', 'date'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Watch::find();

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
            'id' => $this->id,
            'price' => $this->price,
            'pulse' => $this->pulse,
            'nfc' => $this->nfc,
            'brand_id' => $this->brand_id,
            'charging_id' => $this->charging_id,
            'system_id' => $this->system_id,
            'mic' => $this->mic,
            'display' => $this->display,
            'type_id' => $this->type_id,
            'calories' => $this->calories,
            'sleep' => $this->sleep,
            'moisture' => $this->moisture,
            'weather' => $this->weather,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
