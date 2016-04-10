



<?php

use yii\helpers\Html;
use app\models\Data;
/* @var $this yii\web\View */


?>

<div class="site-index">


    <div class="body-content">
        <?php
        $url=Data::$url."quiz/present";
        $this->title = 'My Yii Application';
        echo Html::a('Present Quizzes', $url, ['class' => 'btn btn-success']);

        ?>
    </div>
</div>