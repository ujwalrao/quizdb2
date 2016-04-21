<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form ActiveForm */
?>
<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'about')->textInput() ?>

    <?= $form->field($model, 'rollno')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'stream')->textInput() ?>

    <?= $form->field($model, 'program')->textInput() ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-form -->
