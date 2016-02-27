<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $quizid
 * @property string $quizname
 * @property string $inchargename
 * @property string $courseid
 * @property string $coursename
 * @property string $starttime
 * @property string $endtime
 * @property double $totalscore
 * @property integer $totalquestions
 * @property string $department
 * @property string $setterid
 *
 * @property Comments[] $comments
 * @property Futurequestions[] $futurequestions
 * @property Presentquiz[] $presentquizzes
 * @property Questions[] $questions
 * @property Quizsetter $setter
 * @property Solutions[] $solutions
 * @property Tutorials[] $tutorials
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizname', 'inchargename', 'courseid', 'coursename', 'starttime', 'endtime', 'totalscore', 'totalquestions', 'department', 'setterid'], 'required'],
            [['starttime', 'endtime'], 'safe'],
            [['totalscore'], 'number'],
            [['totalquestions'], 'integer'],
            [['quizname', 'inchargename'], 'string', 'max' => 50],
            [['courseid', 'department'], 'string', 'max' => 20],
            [['coursename'], 'string', 'max' => 40],
            [['setterid'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quizid' => 'Quizid',
            'quizname' => 'Quizname',
            'inchargename' => 'Inchargename',
            'courseid' => 'Courseid',
            'coursename' => 'Coursename',
            'starttime' => 'Starttime',
            'endtime' => 'Endtime',
            'totalscore' => 'Totalscore',
            'totalquestions' => 'Totalquestions',
            'department' => 'Department',
            'setterid' => 'Setterid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['quizid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuturequestions()
    {
        return $this->hasMany(Futurequestions::className(), ['quizid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentquizzes()
    {
        return $this->hasMany(Presentquiz::className(), ['quizid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Questions::className(), ['quizid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetter()
    {
        return $this->hasOne(Quizsetter::className(), ['setterid' => 'setterid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolutions()
    {
        return $this->hasMany(Solutions::className(), ['quizid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorials()
    {
        return $this->hasMany(Tutorials::className(), ['quizid' => 'quizid']);
    }
}
