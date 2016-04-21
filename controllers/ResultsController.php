<?php

namespace app\controllers;

use Yii;
use app\models\Results;
use app\models\Resultssearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultsController implements the CRUD actions for Results model.
 */
class ResultsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Results models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new Resultssearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'id'=>$id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Results model.
     * @param string $userid
     * @param integer $quizid
     * @return mixed
     */
    public function actionView($userid, $quizid)
    {
        return $this->render('view', [
            'model' => $this->findModel($userid, $quizid),
        ]);
    }

    /**
     * Creates a new Results model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    /**
     * Updates an existing Results model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $userid
     * @param integer $quizid
     * @return mixed
     */

    /**
     * Deletes an existing Results model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $userid
     * @param integer $quizid
     * @return mixed
     */


    /**
     * Finds the Results model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $userid
     * @param integer $quizid
     * @return Results the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userid, $quizid)
    {
        if (($model = Results::findOne(['userid' => $userid, 'quizid' => $quizid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
