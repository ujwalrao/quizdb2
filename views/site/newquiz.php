



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
        /*
        echo Html::a('Present Quizzes', $url, ['class' => 'btn btn-success']);
        echo "<br><br><br>";
        
        echo Html::a('Past Quizzes', $url, ['class' => 'btn btn-success']);
        echo "<br><br><br>";
        echo Html::a('Future Quizzes', $url, ['class' => 'btn btn-success']);
*/
?>

        <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Present Quizzes</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href=<?php echo $url ?>>Present Quizzes &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <h2>Past Quizzes</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur.</p>
        <?php $url=Data::$url."quiz/past";?>

        <p><a class="btn btn-default" href=<?php echo $url ?>>Past Quizzes &raquo;</a></p>
    </div>

</div>

</div>










    </div>
</div>