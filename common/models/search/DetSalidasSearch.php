<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetSalidas;

/**
 * DetSalidasSearch represents the model behind the search form about `common\models\DetSalidas`.
 */
class DetSalidasSearch extends DetSalidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cab_id', 'coditem', 'estado'], 'integer'],
            [['descripcion', 'bodega', 'unidad', 'piso', 'observacion', 'comentario'], 'safe'],
            [['cantidad', 'cantidadfiscaliza', 'diferencia'], 'number'],
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
        $query = DetSalidas::find();

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
            'cab_id' => $this->cab_id,
            'coditem' => $this->coditem,
            'cantidad' => $this->cantidad,
            'cantidadfiscaliza' => $this->cantidadfiscaliza,
            'diferencia' => $this->diferencia,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'bodega', $this->bodega])
            ->andFilterWhere(['like', 'unidad', $this->unidad])
            ->andFilterWhere(['like', 'piso', $this->piso])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'comentario', $this->comentario]);

        return $dataProvider;
    }
}
