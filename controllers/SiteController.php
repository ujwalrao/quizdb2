<?php

namespace app\controllers;

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
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

}
