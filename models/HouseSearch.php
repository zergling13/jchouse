<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\House;

/**
 * HouseSearch represents the model behind the search form about `app\models\House`.
 */
class HouseSearch extends House
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isAllowed'], 'integer'],
            [['name', 'intro', 'phone', 'houseType', 'forceType', 'avgPrice', 'address', 'recReason', 'trafficLines', 'designIdea', 'time', 'url'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = House::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'isAllowed' => $this->isAllowed,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'houseType', $this->houseType])
            ->andFilterWhere(['like', 'forceType', $this->forceType])
            ->andFilterWhere(['like', 'avgPrice', $this->avgPrice])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'recReason', $this->recReason])
            ->andFilterWhere(['like', 'trafficLines', $this->trafficLines])
            ->andFilterWhere(['like', 'designIdea', $this->designIdea])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
