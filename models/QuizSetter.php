<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quizsetter".
 *
 * @property string $setterid
 * @property string $password
 * @property string $about
 * @property string $name
 * @property string $dept
 *
 * @property Quiz[] $quizzes
 */
class QuizSetter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quizsetter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setterid', 'password', 'about', 'name', 'dept'], 'required'],
            [['about'], 'string'],
            [['setterid', 'password'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
            [['dept'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setterid' => 'Setterid',
            'password' => 'Password',
            'about' => 'About',
            'name' => 'Name',
            'dept' => 'Dept',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizzes()
    {
        return $this->hasMany(Quiz::className(), ['setterid' => 'setterid']);
    }
}
