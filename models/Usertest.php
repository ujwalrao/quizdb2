<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $userid
 * @property string $password
 * @property string $about
 * @property string $rollno
 * @property string $name
 * @property string $stream
 * @property string $program
 *
 * @property Presentquiz[] $presentquizzes
 * @property Results[] $results
 */
class Usertest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'password', 'rollno', 'name', 'stream', 'program'], 'required'],
            [['about'], 'string'],
            [['userid'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 20],
            [['rollno'], 'string', 'max' => 12],
            [['name'], 'string', 'max' => 50],
            [['stream'], 'string', 'max' => 5],
            [['program'], 'string', 'max' => 10],
            [['rollno'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'password' => 'Password',
            'about' => 'About',
            'rollno' => 'Rollno',
            'name' => 'Name',
            'stream' => 'Stream',
            'program' => 'Program',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentquizzes()
    {
        return $this->hasMany(Presentquiz::className(), ['userid' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Results::className(), ['userid' => 'userid']);
    }

}
