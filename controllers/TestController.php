<?php

namespace app\controllers;
use app\models\Usertest;
use Yii;

class TestController extends \yii\web\Controller
{
    /*
    public function actionIndex()
    {
        return $this->render('index');
    }
*/
    public function actionIndex()
    {
        $model = new Usertest();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                return $this->render('index', [
                    'model' => $model,
                ]);
                // form inputs are valid, do something here
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
