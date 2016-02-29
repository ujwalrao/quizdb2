<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Questions;

/**
 * Questionssearch represents the model behind the search form about `app\models\Questions`.
 */
class Questionssearch extends Questions
{
    public function _construct($id){
        $this->quizid=$id;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizid', 'questionid', 'noofoptions', 'maq', 'saq', 'essay'], 'integer'],
            [['questiontext', 'image', 'option1', 'option2', 'option3', 'option4', 'option5'], 'safe'],
            [['weight1', 'weight2', 'weight3', 'weight4', 'weight5'], 'number'],
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
    public function search($params,$id)
    {
        if(Yii::$app->user->identity['role']='setter') {

            $query = Questions::find()->where(['quizid'=>$id]);
        }
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
            'quizid' => $this->quizid,
            'questionid' => $this->questionid,
            'noofoptions' => $this->noofoptions,
            'weight1' => $this->weight1,
            'weight2' => $this->weight2,
            'weight3' => $this->weight3,
            'weight4' => $this->weight4,
            'weight5' => $this->weight5,
            'maq' => $this->maq,
            'saq' => $this->saq,
            'essay' => $this->essay,
        ]);

        $query->andFilterWhere(['like', 'questiontext', $this->questiontext])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'option1', $this->option1])
            ->andFilterWhere(['like', 'option2', $this->option2])
            ->andFilterWhere(['like', 'option3', $this->option3])
            ->andFilterWhere(['like', 'option4', $this->option4])
            ->andFilterWhere(['like', 'option5', $this->option5]);

        return $dataProvider;
    }
}
