<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usertest */
/* @var $form ActiveForm */
?>
<div class="test-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'userid') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'rollno') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'stream') ?>
        <?= $form->field($model, 'program') ?>
        <?= $form->field($model, 'about') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- test-index -->
