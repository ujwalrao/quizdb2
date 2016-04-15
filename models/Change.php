<?php
/**
 * Created by PhpStorm.
 * User: vidhey
 * Date: 15/4/16
 * Time: 9:01 PM
 */

namespace app\models;
use Yii;
use yii\base\Model;


class Change extends Model
{
    public $current;
    public $new;
    public $confirm;

    public function rules()
    {
        return [

            [['current', 'new' ,'confirm'], 'required'],
            /*
            [['current', 'new' ,'confirm'], 'password'],
            // define validation rules here
            */
        ];
    }
}