<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Perfil;

/**
 * PerfilSearch represents the model behind the search form about `common\models\Perfil`.
 */
class PerfilSearch extends Perfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['nombres', 'foto', 'contaBodegaDestinos'], 'safe'],
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
        $query = Perfil::find();

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
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'contaBodegaDestinos', $this->contaBodegaDestinos]);

        return $dataProvider;
    }
}
