



<?php

use yii\helpers\Html;
/* @var $this yii\web\View */


?>

<div class="site-index">


    <div class="body-content">
        <?php
        $url="http://localhost/quizdb2/web/index.php?r=quiz/present";
        $this->title = 'My Yii Application';
        echo Html::a('Present Quizzes', $url, ['class' => 'btn btn-success']);

        ?>
    </div>
</div>