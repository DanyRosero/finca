<?php

namespace app\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entregaqueso;

/**
 * EntregaquesoSearch represents the model behind the search form about `app\models\Entregaqueso`.
 */
class EntregaquesoSearch extends Entregaqueso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cliente'], 'integer'],
            [['peso_finca', 'peso_entrega', 'precio_libra'], 'number'],
            [['fecha_entrega'], 'safe'],
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
        $query = Entregaqueso::find();

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
            'peso_finca' => $this->peso_finca,
            'peso_entrega' => $this->peso_entrega,
            'precio_libra' => $this->precio_libra,
            'fecha_entrega' => $this->fecha_entrega,
            'id_cliente' => $this->id_cliente,
        ]);

        return $dataProvider;
    }
}
