<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentquiz".
 *
 * @property integer $quizid
 * @property integer $questionid
 * @property string $userid
 * @property integer $attempted
 * @property integer $option1
 * @property integer $option2
 * @property integer $option3
 * @property integer $option4
 * @property integer $option5
 * @property string $essaytext
 *
 * @property User $user
 * @property Quiz $quiz
 */
class Presentquiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentquiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        /*
            [['quizid', 'questionid', 'userid', 'attempted', 'option1', 'option2', 'option3', 'option4', 'option5', 'essaytext'], 'required'],
            [['quizid', 'questionid', 'attempted', 'option1', 'option2', 'option3', 'option4', 'option5'], 'integer'],
            [['essaytext'], 'string'],
            [['userid'], 'string', 'max' => 30]

        */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quizid' => 'Quizid',
            'questionid' => 'Questionid',
            'userid' => 'Userid',
            'attempted' => 'Attempted',
            'option1' => 'Option1',
            'option2' => 'Option2',
            'option3' => 'Option3',
            'option4' => 'Option4',
            'option5' => 'Option5',
            'essaytext' => 'Essaytext',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['quizid' => 'quizid']);
    }
}
