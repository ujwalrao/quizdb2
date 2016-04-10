<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use app\models\user;
use \russ666\widgets\Countdown;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\QuestionForm */


$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-lg-5">
			
			



            <?php
            $date1= date('Y-m-d H:i:s', time()+60*60*5+30*60);
            $diff = abs(strtotime($date1) - strtotime($datetime));
            //echo $diff;
            echo \russ666\widgets\Countdown::widget([
                'datetime' => date('Y-m-d H:i:s', time()+60*60*5+30*60+$diff),
                'format' => '%D:%H:%M:%S',
                'events' => [
                    'finish' => 'function(){ document.getElementById("form-submit").submit(); }',
                ],
            ]);
            //Pjax::begin();

            ?>
            <?php
            $i=0;
            $noofquestions=count($maindata);
            echo $noofquestions;
            //$questions=new SplFixedArray($noofquestions);
            
            //for($t=0;$t<$noofquestions;$t++){
              //  $questions[$t]=$t;
           // }
            //$questions=(array)$questions;
            //shuffle($questions);
            //changing working
            
            
            
            foreach($maindata as $value) {
                ?>
                <?php
            

                $form = ActiveForm::begin(['id' => 'form-question'.$i,'options' => ['autocomplete' => 'off']]);

                ?>
                <?php //echo (string)($i+1).')'; ?>
                
                 <?= $maindata[$i]['questiontext']?>
               
<?php
                //$model->questionid=$maindata[$i]['questionid'];
                //echo "a";
                
              //$noofquestions=count($maindata);
              // Number of options are not changing. (Specified)
              
            //$questions=new SplFixedArray($noofquestions);
            
            //for($t=0;$t<$noofquestions;$t++){
              //  $questions[$t]=$t;
           // }
            //$questions=(array)$questions;
            //shuffle($questions);
			if($_GET['opt']==0)
			{
				$a = "option1";
				$b = "option2";
				$c = "option3";
				$d = "option4";
				$e = "option5";
				
				
				}else if($_GET['opt']==1)  {
					$numbers = range(1, 5);
					shuffle($numbers);
					$a = "option".$numbers[0];
					$b = "option".$numbers[1];
					$c = "option".$numbers[2];
					$d = "option".$numbers[3];
					$e = "option".$numbers[4];
					
					}else if($_GET['opt']==2) {
							$a = "option1";
							$b = "option2";
							$c = "option3";
							$d = "option4";
							$e = "option5";	
							//$maindata[$i]['questionid']	
							//$con = mysqli_connect("","","","");
							//$noofquestions = count($maindata);
							//$qnumbers = range(1, $noofquestions);
							//shuffle($qnumbers);
							
															
						
						}else if($_GET['opt']==3) {
							$numbers = range(1, 5);
							shuffle($numbers);
							$a = "option".$numbers[0];
							$b = "option".$numbers[1];
							$c = "option".$numbers[2];
							$d = "option".$numbers[3];
							$e = "option".$numbers[4];							
							
							}                
            


                if($maindata[$i]['option1']!=NULL){
                   // echo "a)";
                     echo $form->field($model, 'option1')->checkbox(['label' => 'a) '. $maindata[$i][$a]]);
                }
                if($maindata[$i]['option2']!=NULL){
                    //echo "b)";
                    echo $form->field($model, 'option2')->checkbox(['label' => 'b) '.$maindata[$i][$b]]);
                }
                if($maindata[$i]['option3']!=NULL){
                    //echo "c)";
                    echo $form->field($model, 'option3')->checkbox(['label' => 'c) '.$maindata[$i][$c]]);
                }
                if($maindata[$i]['option4']!=NULL){
                    //echo "d)";
                    echo $form->field($model, 'option4')->checkbox(['label' => 'd) '.$maindata[$i][$d]]);
                }
                if($maindata[$i]['option5']!=NULL){
                   // echo "e)";
                    echo $form->field($model, 'option5')->checkbox(['label' => 'e) '.$maindata[$i][$e]]);
                }	
				


                
                
                
              
 echo Html::activeHiddenInput($model,'questionid',['value'=> $maindata[$i]['questionid']]) ;
 echo Html::activeHiddenInput($model,'userid',['value'=> 'user']) 
                  ;
echo Html::activeHiddenInput($model,'quizid',['value'=> $maindata[$i]['quizid']]) ;
if(!isset($quizid)) {
    $quizid = $maindata[$i]['quizid'];
}
//echo Html::activeHiddenInput($model,'query1',['value'=> $maindata]) ;
                  
                   
                 //echo $form->hiddenField($model,'questionid',array('value'=>$maindata[$questions[$i]]['questionid']));
                //Html::activeHiddenInput($model, 'my_field')
                // $form->field($model, 'questionid',array('value'=>$maindata[$questions[$i]]['questionid']))->hiddenInput()->label(false);


//echo $form->field($model,'questionid',)

  //               echo $form->hiddenField($model,'questionid',['type'=>'hidden','value'=> $maindata[$questions[$i]]['questionid']]);
  ?> 
                    
                              <div class="form-group">
                    <?= Html::submitButton('submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
               
                </div>

                <?php ActiveForm::end();
                $i++;
                
                
            }
            ?>
            

        </div>
    </div>


</div>




<?php
            $form = ActiveForm::begin(['id' => 'form-submit','action'=>'index.php?r=questions/submission&id='.$quizid]);
              ?>
              <div class="form-group" id="endtest">
                    <?= Html::submitButton('endtest', ['class' => 'btn btn-primary', 'name' => 'endtest']) ?>
               
                </div>

                <?php ActiveForm::end();
                
?>
 <?=  LinkPager::widget(['pagination' => $pagination]) ?>

<?php

           // Pjax::end();
            ?>
