<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Results;

/**
 * Resultssearch represents the model behind the search form about `app\models\Results`.
 */
class Resultssearch extends Results
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'quizname', 'feedback', 'order'], 'safe'],
            [['quizid', 'correctattempted', 'wrongattempted', 'totalquestions'], 'integer'],
            [['totalscore', 'obtainedscore'], 'number'],
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
        $query = Results::find()->where(['quizid'=>$id]);

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
            'totalscore' => $this->totalscore,
            'obtainedscore' => $this->obtainedscore,
            'correctattempted' => $this->correctattempted,
            'wrongattempted' => $this->wrongattempted,
            'totalquestions' => $this->totalquestions,
        ]);

        $query->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'quizname', $this->quizname])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'order', $this->order]);

        return $dataProvider;
    }
}
