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
use scotthuangzl\googlechart\GoogleChart;
$analysis=array(array('Task', 'Percentage in quiz'));

$i=count($result);
$j=0;
while($i!=0){
    $a=$result[$j]['obtainedscore'];
    $b=$result[$j]['totalscore'];
    $ans=$a/$b;
    $ans*=100;
    array_push($analysis,array($result[$j]['quizname'],$ans));
    $j++;
    $i--;
}


/*

print_r(gettype(array(
    array('Task', 'Hours per Day'),
    array('Work', 1),
    array('Eat', 3),
    array('Commute', 2),
    array('Watch TV', 2),
    array('Sleep', 2)
)));

print_r("<br><br><br><br><br>");

print_r(gettype($analysis));
exit();

*/
?>

<div class="col-sm-5">
<?php
echo GoogleChart::widget(array('visualization' => 'LineChart',
    'data' => $analysis,
    'options' => array('title' => 'My Daily Activity')));

?>






