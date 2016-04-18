<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property string $userid
 * @property integer $quizid
 * @property string $quizname
 * @property double $totalscore
 * @property double $obtainedscore
 * @property integer $correctattempted
 * @property integer $wrongattempted
 * @property integer $totalquestions
 * @property string $feedback
 * @property string $order
 *
 * @property User $user
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'quizid', 'quizname', 'totalscore', 'obtainedscore', 'correctattempted', 'wrongattempted', 'totalquestions', 'feedback', 'order'], 'required'],
            [['quizid', 'correctattempted', 'wrongattempted', 'totalquestions'], 'integer'],
            [['totalscore', 'obtainedscore'], 'number'],
            [['feedback'], 'string'],
            [['userid'], 'string', 'max' => 30],
            [['quizname'], 'string', 'max' => 50],
            [['order'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'quizid' => 'Quizid',
            'quizname' => 'Quizname',
            'totalscore' => 'Totalscore',
            'obtainedscore' => 'Obtainedscore',
            'correctattempted' => 'Correctattempted',
            'wrongattempted' => 'Wrongattempted',
            'totalquestions' => 'Totalquestions',
            'feedback' => 'Feedback',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['userid' => 'userid']);
    }
}
