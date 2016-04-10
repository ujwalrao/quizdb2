<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quizsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quizid') ?>

    <?= $form->field($model, 'quizname') ?>

    <?= $form->field($model, 'inchargename') ?>

    <?= $form->field($model, 'courseid') ?>

    <?= $form->field($model, 'coursename') ?>

    <?php // echo $form->field($model, 'starttime') ?>

    <?php // echo $form->field($model, 'endtime') ?>

    <?php // echo $form->field($model, 'totalscore') ?>

    <?php // echo $form->field($model, 'totalquestions') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'setterid') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
