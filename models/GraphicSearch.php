<?php

namespace jonmer09\dashboard\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use jonmer09\dashboard\models\Graphic;

/**
 * GraphicSearch represents the model behind the search form about `jonmer09\dashboard\models\Graphic`.
 */
class GraphicSearch extends Graphic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'widget_id', 'source_type'], 'integer'],
            [['name', 'source', 'created_at'], 'safe'],
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
        $query = Graphic::find();

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
            'widget_id' => $this->widget_id,
            'source_type' => $this->source_type,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}
