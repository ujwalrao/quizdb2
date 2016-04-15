<?php

use yii\helpers\Html;
use app\models\Data;


/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = 'Create Questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => Data::$url."questions/index&id=".$id];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'id'=>$id,
        'model' => $model,
    ]) ?>

</div>
