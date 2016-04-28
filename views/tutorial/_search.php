<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tutorialssearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutorials-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quizid') ?>

    <?= $form->field($model, 'tutorialid') ?>

    <?= $form->field($model, 'contentlink') ?>

    <?= $form->field($model, 'tutorialname') ?>

    <?= $form->field($model, 'coursename') ?>

    <?php // echo $form->field($model, 'courseid') ?>

    <?php // echo $form->field($model, 'tutorialtext') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
