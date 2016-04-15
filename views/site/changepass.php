<?php
/**
 * Created by PhpStorm.
 * User: vidhey
 * Date: 15/4/16
 * Time: 8:09 PM
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'current')->passwordInput() ?>

<?= $form->field($model, 'new')->passwordInput() ?>

<?= $form->field($model, 'confirm')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
</div>

<?php ActiveForm::end(); ?>


