<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $adminid
 * @property string $about
 * @property string $name
 * @property string $department
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*
            [['adminid', 'name', 'department'], 'required'],
            [['about'], 'string'],
            [['adminid'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
            [['department'], 'string', 'max' => 10]

            */];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adminid' => 'Adminid',
            'about' => 'About',
            'name' => 'Name',
            'department' => 'Department',
        ];
    }
}
