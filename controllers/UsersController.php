<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\Userssearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\SignupForm;
use app\models\Student;
use app\models\Admin;

use app\models\Setter;
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public function behaviors()
    {
        return [

            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create','update','index','view','search','form'],
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
     * Lists all Users models.
     * @return mixed
     */
    public static function csvsignup($temp){

        $model = new SignupForm();
        $model->username=$temp[0];
        $model->email=$temp[1];
        $model->password=$temp[2];
        $model->role=$temp[3];

        if($temp[3]=='admin'){
                $admin=new Admin();
                $admin->adminid=$temp[0];
                $admin->save();
            }

            if($temp[3]=='student'){
                $student=new Student();
                $student->userid=$temp[0];
                $student->save();

            }

            if($temp[3]=='setter'){
                $setter=new Quizsetter();
                $setter->setterid=$temp[0];
                //print_r( $setter->save());

                $setter->save();
                //exit();
            }
            if(!$model->signup()){
               // print_r($model);
                //exit();
            }
            /*
                        if ($user = $model->signup()) {
                            if (Yii::$app->getUser()->login($user)) {
                                return $this->goHome();
                            }
                        }
                        removed automatic login during submission signupform
                        */
        }

    public function actionIndex()
    {
        if(Yii::$app->user->identity['role']=='admin') {


            $searchModel = new Userssearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



            $model = new UploadForm();

            if (Yii::$app->request->isPost) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->upload()) {
                    // file is uploaded successfully
                    $file =fopen('uploads/' . $model->imageFile->baseName . '.' . $model->imageFile->extension,"r");
                    while(! feof($file))
                    {
                        $array=fgetcsv($file);
                        UsersController::csvsignup($array);
                    }
                    fclose($file);

                    return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'model'=>$model,
                    ]);

                }
            }




            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model'=>$model,
            ]);
        }
        else{
            return $this->render('//site/error', [
                'message'=>"Nonadmins arent allowed to manage users",
                'name'=>"Unauthorized for Nonadmins",
            ]);
        }
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
