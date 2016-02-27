<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Questionssearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quizid') ?>

    <?= $form->field($model, 'questionid') ?>

    <?= $form->field($model, 'questiontext') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'noofoptions') ?>

    <?php // echo $form->field($model, 'option1') ?>

    <?php // echo $form->field($model, 'option2') ?>

    <?php // echo $form->field($model, 'option3') ?>

    <?php // echo $form->field($model, 'option4') ?>

    <?php // echo $form->field($model, 'option5') ?>

    <?php // echo $form->field($model, 'weight1') ?>

    <?php // echo $form->field($model, 'weight2') ?>

    <?php // echo $form->field($model, 'weight3') ?>

    <?php // echo $form->field($model, 'weight4') ?>

    <?php // echo $form->field($model, 'weight5') ?>

    <?php // echo $form->field($model, 'maq') ?>

    <?php // echo $form->field($model, 'saq') ?>

    <?php // echo $form->field($model, 'essay') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
