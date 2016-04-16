<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class QuestionForm extends Model
{
    public $questiontext;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $option5;
    public $quizid;
    public $questionid;
    public $attempted;
    public $essaytext;


    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
        array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'insert,update'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function upload()
    {
        if ($this->validate()) {
            $presentquiz = new Presentquiz();
            $presentquiz->option1 = $this->option1;
            $presentquiz->option2= $this->option2;
            $presentquiz->option3= $this->option3;
            $presentquiz->option4= $this->option4;
            $presentquiz->option5= $this->option5;
            $presentquiz->userid='user';
            $presentquiz->attempted=1;
            $presentquiz->quizid=$this->quizid;
            $presentquiz->questionid=$this->questionid;

            if ($presentquiz->save()) {
                return $presentquiz;
            }
        }

        return null;
    }
}
