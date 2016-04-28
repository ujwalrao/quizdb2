<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tutorials;

/**
 * Tutorialssearch represents the model behind the search form about `app\models\Tutorials`.
 */
class Tutorialssearch extends Tutorials
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizid', 'tutorialid'], 'integer'],
            [['contentlink', 'tutorialname', 'coursename', 'courseid', 'tutorialtext'], 'safe'],
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
        $query = Tutorials::find();

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
            'tutorialid' => $this->tutorialid,
        ]);

        $query->andFilterWhere(['like', 'contentlink', $this->contentlink])
            ->andFilterWhere(['like', 'tutorialname', $this->tutorialname])
            ->andFilterWhere(['like', 'coursename', $this->coursename])
            ->andFilterWhere(['like', 'courseid', $this->courseid])
            ->andFilterWhere(['like', 'tutorialtext', $this->tutorialtext]);

        return $dataProvider;
    }
}
