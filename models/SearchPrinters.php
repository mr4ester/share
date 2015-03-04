<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Printers;

/**
 * SearchPrinters represents the model behind the search form about `app\models\Printers`.
 */
class SearchPrinters extends Printers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_printer'], 'integer'],
            [['invent_num_printer_1', 'invent_num_printer_2', 'print_1', 'print_2', 'print_3', 'print_4', 'print_5', 'print_6', 'print_7', 'print_8', 'print_9', 'print_10', 'date_1', 'date_2', 'old_staff_1', 'old_staff_2'], 'safe'],
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
        $query = Printers::find();

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
            'id_printer' => $this->id_printer,
        ]);

        $query->andFilterWhere(['like', 'invent_num_printer_1', $this->invent_num_printer_1])
            ->andFilterWhere(['like', 'invent_num_printer_2', $this->invent_num_printer_2])
            ->andFilterWhere(['like', 'print_1', $this->print_1])
            ->andFilterWhere(['like', 'print_2', $this->print_2])
            ->andFilterWhere(['like', 'print_3', $this->print_3])
            ->andFilterWhere(['like', 'print_4', $this->print_4])
            ->andFilterWhere(['like', 'print_5', $this->print_5])
            ->andFilterWhere(['like', 'print_6', $this->print_6])
            ->andFilterWhere(['like', 'print_7', $this->print_7])
            ->andFilterWhere(['like', 'print_8', $this->print_8])
            ->andFilterWhere(['like', 'print_9', $this->print_9])
            ->andFilterWhere(['like', 'print_10', $this->print_10])
            ->andFilterWhere(['like', 'date_1', $this->date_1])
            ->andFilterWhere(['like', 'date_2', $this->date_2])
            ->andFilterWhere(['like', 'old_staff_1', $this->old_staff_1])
            ->andFilterWhere(['like', 'old_staff_2', $this->old_staff_2]);

        return $dataProvider;
    }
}
