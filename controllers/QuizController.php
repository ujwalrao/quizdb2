<?php

namespace app\controllers;

use app\models\Enrollment;
use Yii;
use app\models\Quiz;
use app\models\Quizsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Enroll;
use app\models\Data;
use app\models\Presentquiz;
/**
 * QuizController implements the CRUD actions for Quiz model.
 */
class QuizController extends Controller
{
    public function behaviors()
    {
        return [

            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create','update','index','view','search','form','present'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']]]
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quiz models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity['role'] != 'student') {
            $searchModel = new Quizsearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            return $this->render('//site/error', [
                'message'=>"Students arent allowed to manage quizes",
                'name'=>"Unauthorized for students",
            ]);

        }
    }

    public function actionAnalysis($id){
         $data=Presentquiz::find()->where(['quizid'=> $id])->asArray()->all();
        
        return $this->render('analysis',[
            'data'=>$data,
            ]);

    }
    public function actionTutorial(){




        return $this->render('tutorial',[

        ]);


    }

    /**
     * Displays a single Quiz model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quiz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionPresent()
   {
       $searchModel = new Quizsearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('present', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
       ]);
   }
    public function actionPast()
    {
        $searchModel = new Quizsearch();
        $dataProvider = $searchModel->searchpast(Yii::$app->request->queryParams);

        return $this->render('past', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new Quiz();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->quizid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Quiz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->quizid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Quiz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionEnrollment($id)
    {
        $model = new Enroll();
        $url = Data::$url."questions/quizattempt&id=".$id;

        $quiz=Quiz::find()->where(['quizid'=>$id])->one();

        if($quiz->enrollmentkey==NULL){
            return $this->redirect($url,302);

        }
        if ($model->load(Yii::$app->request->post())) {
            $temp=Yii::$app->request->post();
            $temp = $temp['Enroll'];
            if(strcmp($quiz->enrollmentkey,$temp['enrollmentkey'])){
                print_r("err");
                exit();
            }
            else{
                return $this->redirect($url,302);

            }
        } else {
            return $this->render('enrollment', [
                'model' => $model,
            ]);
        }

    }


    /**
     * Finds the Quiz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quiz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quiz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
