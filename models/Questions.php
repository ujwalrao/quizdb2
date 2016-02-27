<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property integer $quizid
 * @property integer $questionid
 * @property string $questiontext
 * @property string $image
 * @property integer $noofoptions
 * @property string $option1
 * @property string $option2
 * @property string $option3
 * @property string $option4
 * @property string $option5
 * @property double $weight1
 * @property double $weight2
 * @property double $weight3
 * @property double $weight4
 * @property double $weight5
 * @property integer $maq
 * @property integer $saq
 * @property integer $essay
 *
 * @property Comments[] $comments
 * @property Quiz $quiz
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quizid', 'questionid', 'questiontext', 'image', 'noofoptions', 'option1', 'option2', 'option3', 'option4', 'option5', 'weight1', 'weight2', 'weight3', 'weight4', 'weight5', 'maq', 'saq', 'essay'], 'required'],
            [['quizid', 'questionid', 'noofoptions', 'maq', 'saq', 'essay'], 'integer'],
            [['questiontext'], 'string'],
            [['weight1', 'weight2', 'weight3', 'weight4', 'weight5'], 'number'],
            [['image'], 'string', 'max' => 100],
            [['option1', 'option2', 'option3', 'option4', 'option5'], 'string', 'max' => 50]
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
            'questiontext' => 'Questiontext',
            'image' => 'Image',
            'noofoptions' => 'Noofoptions',
            'option1' => 'Option1',
            'option2' => 'Option2',
            'option3' => 'Option3',
            'option4' => 'Option4',
            'option5' => 'Option5',
            'weight1' => 'Weight1',
            'weight2' => 'Weight2',
            'weight3' => 'Weight3',
            'weight4' => 'Weight4',
            'weight5' => 'Weight5',
            'maq' => 'Maq',
            'saq' => 'Saq',
            'essay' => 'Essay',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['questionid' => 'quizid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['quizid' => 'quizid']);
    }
}
