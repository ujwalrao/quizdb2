<?php

namespace app\controllers;

use app\models\Changepass;
use app\models\Changepassword;
use app\models\User;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AdminLogin;
use app\models\SignupForm;
use app\models\Admin;
use app\models\Quizsetter;
use app\models\Student;

use app\models\Change;


Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','changepass','newquiz','signup','form','upload',],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChangepass()
    {
        $model=new Change();
        if ($model->load(Yii::$app->request->post())) {
          $username=Yii::$app->user->identity['username'];
            $user=User::find()->where(['username'=>$username])->one();
            if($user->validatePassword($model->current)){
                if(!strcmp($model->new,$model->confirm)) {

                    $user->setPassword($model->new);
                    $user->save();
                    Yii::$app->user->logout();

                }
                else{
                    print_r("not same pass");
                    exit();
                }
            }
            else{

            }





/*
            $hash =Yii::$app->security->generatePasswordHash($model->current);
            print_r($hash);
            print_r("    ");
            $password=Yii::$app->user->identity['password_hash'];
            print_r($password);
            exit();
            if (Yii::$app->getSecurity()->validatePassword($password, $hash)) {
                print_r("dam");
                exit();
            } else {
                // wrong password
            }
*/
            return $this->goHome();

        }
        else {

            return $this->render('changepass', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionNewquiz()
    {
        return $this->render('newquiz');
    }
    public function actionError(){
        return $this->render('error');
    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $temp=Yii::$app->request->post();
            $temp = $temp['SignupForm'];
            $model->role=$temp['role'];
            if($temp['role']=='admin'){
                $admin=new Admin();
                $admin->adminid=$temp['username'];
                $admin->save();
            }

            if($temp['role']=='student'){
                $student=new Student();
                $student->userid=$temp['username'];
                $student->save();

            }

            if($temp['role']=='setter'){
                $setter=new Quizsetter();
                $setter->setterid=$temp['username'];
                //print_r( $setter->save());

                $setter->save();
                //exit();
            }
            //print_r($model->email);
            //exit();
$model->signup();
/*
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
            removed automatic login during submission signupform
            */
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionForm(){
        $username=Yii::$app->user->identity['username'];
       // $model = new Student();

        $model=Student::find()->where(['userid'=>$username])->one();


        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $temp=Yii::$app->request->post();

$temp=$temp['Student'];


                $model->about=$temp['about'];

                $model->rollno=$temp['rollno'];
                $model->name=$temp['name'];
                $model->stream=$temp['stream'];
                $model->program=$temp['program'];

                $model->save(false);

                return $this->render('index', [
                    'model' => $model,
                ]);

            }
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // $fileupload->saveAs('uploads/' . $fileupload->baseName . '.' . $fileupload->extension);
                // file is uploaded successfully
                if($model->save())
                {
                    $image->saveAs($path);
                    // return $this->redirect(['view', 'id'=>$model->_id]);
                } else {
                    // error in saving model
                }
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}
