<?php

namespace app\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bovinos;

/**
 * BovinosSearch represents the model behind the search form about `app\models\Bovinos`.
 */
class BovinosSearch extends Bovinos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'propietario', 'id_madre', 'id_grupo'], 'integer'],
            [['color', 'sexo', 'nacimiento', 'raza', 'cachos_detalle'], 'safe'],
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
        $query = Bovinos::find();

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
            'propietario' => $this->propietario,
            'nacimiento' => $this->nacimiento,
            'id_madre' => $this->id_madre,
            'id_grupo' => $this->id_grupo,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'raza', $this->raza])
            ->andFilterWhere(['like', 'cachos_detalle', $this->cachos_detalle]);

        return $dataProvider;
    }
}
