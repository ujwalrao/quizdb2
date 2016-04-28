



<?php

use yii\helpers\Html;
use app\models\Data;
/* @var $this yii\web\View */


?>

<div class="site-index">


    <div class="body-content">
<?php
        if(Yii::$app->user->identity['role']=='student') {







            $url = Data::$url."site/newquiz";
            $this->title = 'My Yii Application';
            //echo Html::a('Challenges', $url, ['class' => 'btn btn-success']);
            echo "<br><br><br>";

            //echo Html::a('Tutorials', $url, ['class' => 'btn btn-success']);
            echo "<br><br><br>";

            //echo Html::a('Problemset', $url, ['class' => 'btn btn-success']);

?>

            <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Challenges</h2>

                <p>Challenges about.</p>

                <p><a class="btn btn-default" href=<?php echo $url ?>>Challenges &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <?php             $url = Data::$url."tutorial/index"; ?>
                <h2>Tutorials</h2>

                <p>Tutorials about.</p>

                <p><a class="btn btn-default" href=<?php echo $url ?>>Tutorials &raquo;</a></p>
            </div>
            
        </div>

    </div>






































<?php





        }
        if(Yii::$app->user->identity['role']=='setter') {
$url = Data::$url."quiz/index";

?>




        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Manage Quizzes</h2>

                    <p>Challenges about.</p>

                    <p><a class="btn btn-default" href=<?php echo $url ?>>Manage Quizzes &raquo;</a></p>
                </div>
<?php             $url = Data::$url."tutorial/index"; ?>
<div class="col-lg-4">
                    <h2>Tutorials</h2>

                    <p>Tutorials about.</p>

                    <p><a class="btn btn-default" href=<?php echo $url ?>>Add Tutorial &raquo;</a></p>
                </div>

            </div>

        </div>



<?php
/*


            $url = Data::$url."quiz/index";

            echo Html::a('Managequizes', $url, ['class' => 'btn btn-primary']);

echo "<br><br>";
            $url = Data::$url."tutorial/index";
            $this->title = 'My Yii Application';
            echo Html::a('Add tutorials', $url, ['class' => 'btn btn-primary']);

*/


        }

if(Yii::$app->user->identity['role']=='admin') {

?>

<div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Manage Challenges</h2>
<?php           $url = Data::$url."quiz/index"; ?>
<p>Manage challenges.</p>

                    <p><a class="btn btn-default" href=<?php echo $url ?>>Manage Challenges &raquo;</a></p>
    </div>
    <?php             $url = Data::$url."tutorial/index"; ?>
    <div class="col-lg-4">
        <h2>Manage Users</h2>
<?php           $url = Data::$url."users/index"; ?>
<p>Manage Users.</p>

        <p><a class="btn btn-default" href=<?php echo $url ?>>Manage Users &raquo;</a></p>
    </div>
                <div class="col-lg-4">
                    <h2>Manage Tutorials</h2>
                    <?php           $url = Data::$url."tutorial/index"; ?>
                    <p>Manage Tutorials.</p>

                    <p><a class="btn btn-default" href=<?php echo $url ?>>Manage Tutorials &raquo;</a></p>
                </div>



            </div>

</div>




<?php
    /*
            $url = Data::$url."quiz/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Challenges', $url, ['class' => 'btn btn-primary black-background white ']);
            echo "<br>";
            echo "<br>";
            echo "<br>";

            $url = Data::$url."users/index";
            $this->title = 'My Yii Application';
            echo Html::a('Manage-Users', $url, ['class' => 'btn btn-primary btn-lg ']);
*/

        }



?>
    </div>
</div>