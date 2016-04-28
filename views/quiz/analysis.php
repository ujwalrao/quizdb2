<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

use scotthuangzl\googlechart\GoogleChart;
use miloschuman\highcharts\Highcharts;

$analysis=[];
$names=[];
foreach ($data as $key => $value) {
    $string="Question".$value['questionid'];
     if(!isset($names[$value['questionid']-1])){
        $names[$value['questionid']-1]=$string;
     }
    if(isset($analysis[$value['questionid']-1])){
        $analysis[$value['questionid']-1]++;
     }
     else{
           $analysis[$value['questionid']-1]=0;
        
     }



    
}


if(Yii::$app->user->identity['role']=='setter'){
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Question Analysis'],
            'xAxis' => [
                'categories' => $names
            ],
            'yAxis' => [
                'title' => ['text' => 'Attempted strength']
            ],
            'series' => [
                ['name' => 'No. of students attempted', 'data' => $analysis]
            ]
        ]
    ]);
}


?>