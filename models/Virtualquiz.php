<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "virtualquiz".
 *
 * @property integer $quizid
 * @property integer $questionid
 * @property string $userid
 * @property double $attempted
 * @property integer $option1
 * @property integer $option2
 * @property integer $option3
 * @property integer $option4
 * @property integer $option5
 * @property string $essaytext
 */
class Virtualquiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'virtualquiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [/*
            [['quizid', 'questionid', 'userid', 'attempted', 'essaytext'], 'required'],
            [['quizid', 'questionid', 'option1', 'option2', 'option3', 'option4', 'option5'], 'integer'],
            [['attempted'], 'number'],
            [['essaytext'], 'string'],
            [['userid'], 'string', 'max' => 30]
        */];
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
}
