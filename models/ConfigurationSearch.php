<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Configuration;

/**
 * ConfigurationSearch represents the model behind the search form about `app\models\Configuration`.
 */
class ConfigurationSearch extends Configuration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_configuration'], 'integer'],
            [['invent_num_system', 'invent_num_monitor', 'invent_num_printer', 'cpu', 'motherboard', 'graphics', 'monitor_1', 'monitor_2', 'hdd_1', 'hdd_2', 'memory_1', 'memory_2', 'memory_3', 'memory_4', 'mac', 'print_1', 'print_2', 'print_3', 'print_4', 'print_5', 'print_6', 'print_7', 'print_8', 'print_9', 'print_10','date','old_staff'], 'safe'],
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
        $query = Configuration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_configuration' => $this->id_configuration,
        ]);

        $query->andFilterWhere(['like', 'invent_num_system', $this->invent_num_system])
            ->andFilterWhere(['like', 'invent_num_monitor', $this->invent_num_monitor])
            ->andFilterWhere(['like', 'invent_num_printer', $this->invent_num_printer])
            ->andFilterWhere(['like', 'cpu', $this->cpu])
            ->andFilterWhere(['like', 'motherboard', $this->motherboard])
            ->andFilterWhere(['like', 'graphics', $this->graphics])
            ->andFilterWhere(['like', 'monitor_1', $this->monitor_1])
            ->andFilterWhere(['like', 'monitor_2', $this->monitor_2])
            ->andFilterWhere(['like', 'hdd_1', $this->hdd_1])
            ->andFilterWhere(['like', 'hdd_2', $this->hdd_2])
            ->andFilterWhere(['like', 'memory_1', $this->memory_1])
            ->andFilterWhere(['like', 'memory_2', $this->memory_2])
            ->andFilterWhere(['like', 'memory_3', $this->memory_3])
            ->andFilterWhere(['like', 'memory_4', $this->memory_4])
            ->andFilterWhere(['like', 'mac', $this->mac])
            ->andFilterWhere(['like', 'print_1', $this->print_1])
            ->andFilterWhere(['like', 'print_2', $this->print_2])
            ->andFilterWhere(['like', 'print_3', $this->print_3])
            ->andFilterWhere(['like', 'print_4', $this->print_4])
            ->andFilterWhere(['like', 'print_5', $this->print_5])
            ->andFilterWhere(['like', 'print_6', $this->print_6])
            ->andFilterWhere(['like', 'print_7', $this->print_7])
            ->andFilterWhere(['like', 'print_8', $this->print_8])
            ->andFilterWhere(['like', 'print_9', $this->print_9])
            ->andFilterWhere(['like', 'print_10', $this->print_10]);

        return $dataProvider;
    }
}
