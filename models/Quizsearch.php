<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quiz;

/**
 * Quizsearch represents the model behind the search form about `app\models\Quiz`.
 */
class Quizsearch extends Quiz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizid', 'totalquestions'], 'integer'],
            [['quizname', 'inchargename', 'courseid', 'coursename', 'starttime', 'endtime', 'department', 'setterid'], 'safe'],
            [['totalscore'], 'number'],
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
        if(Yii::$app->user->identity['role']=='admin') {
            $query = Quiz::find();
        }
        if(Yii::$app->user->identity['role']=='setter') {
            $query = Quiz::find()->where(['setterid'=>Yii::$app->user->identity['username']]);
        }
        if(Yii::$app->user->identity['role']=='student') {
            $query = Quiz::find();
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
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'totalscore' => $this->totalscore,
            'totalquestions' => $this->totalquestions,
        ]);

        $query->andFilterWhere(['like', 'quizname', $this->quizname])
            ->andFilterWhere(['like', 'inchargename', $this->inchargename])
            ->andFilterWhere(['like', 'courseid', $this->courseid])
            ->andFilterWhere(['like', 'coursename', $this->coursename])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'setterid', $this->setterid]);

        return $dataProvider;
    }
}
