<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>



<div class="quiz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enrollmentkey')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
