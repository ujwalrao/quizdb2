<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorials".
 *
 * @property integer $quizid
 * @property integer $tutorialid
 * @property string $contentlink
 * @property string $tutorialname
 * @property string $coursename
 * @property string $courseid
 * @property string $tutorialtext
 *
 * @property Quiz $quiz
 */
class Tutorials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorials';
    }

    /**
     * @inheritdoc
     */
    public $file;
    public function rules()
    {
        return [
            [['quizid', 'tutorialid'], 'integer'],
            [['tutorialid',  'tutorialname', 'coursename', 'courseid', 'tutorialtext'], 'required'],
            [['tutorialtext'], 'string'],
            [['contentlink'], 'string', 'max' => 100],
            [['tutorialname'], 'string', 'max' => 40],
            [['file'],'safe'],
            [['file'],'file', 'extensions'=>'pdf'],
            [['coursename', 'courseid'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quizid' => 'Quizid',
            'tutorialid' => 'Tutorialid',
            'file' => 'File to upload',
            'contentlink' => 'Contentlink',
            'tutorialname' => 'Tutorialname',
            'coursename' => 'Coursename',
            'courseid' => 'Courseid',
            'tutorialtext' => 'Tutorialtext',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['quizid' => 'quizid']);
    }
}
