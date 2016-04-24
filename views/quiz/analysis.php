<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use Yii;
use scotthuangzl\googlechart\GoogleChart;
use miloschuman\highcharts\Highcharts;



if(Yii::$app->user->identity['role']=='setter'){
    echo \miloschuman\highcharts\Highmaps::widget([
        'options' => [
            'title' => ['text' => 'Question Analysis'],
            'xAxis' => [
                'categories' => ['Apples', 'Bananas', 'Oranges']
            ],
            'yAxis' => [
                'title' => ['text' => 'Fruit eaten']
            ],
            'series' => [
                ['name' => 'Jane', 'data' => [1, 0, 4]],
                ['name' => 'John', 'data' => [5, 7, 3]]
            ]
        ]
    ]);
}


?>