<?php

namespace app\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trabajo;

/**
 * TrabajoSearch represents the model behind the search form about `app\models\Trabajo`.
 */
class TrabajoSearch extends Trabajo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duracion_dias', 'id_ubicacion'], 'integer'],
            [['tipo', 'fecha_inicio', 'fecha_fin'], 'safe'],
            [['costo'], 'number'],
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
        $query = Trabajo::find();

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
            'duracion_dias' => $this->duracion_dias,
            'costo' => $this->costo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'id_ubicacion' => $this->id_ubicacion,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
