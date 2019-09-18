<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CabSalidas;

/**
 * CabSalidasSearch represents the model behind the search form about `app\models\CabSalidas`.
 */
class CabSalidasSearch extends CabSalidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'docnum', 'salidanum', 'estado'], 'integer'],
            [['tiposalida', 'fechadocumento', 'solicita', 'aprueba', 'retira'], 'safe'],
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
        $query = CabSalidas::find();

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
            'docnum' => $this->docnum,
            'salidanum' => $this->salidanum,
            'fechadocumento' => $this->fechadocumento,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'tiposalida', $this->tiposalida])
            ->andFilterWhere(['like', 'solicita', $this->solicita])
            ->andFilterWhere(['like', 'aprueba', $this->aprueba])
            ->andFilterWhere(['like', 'retira', $this->retira]);

        return $dataProvider;
    }
}
