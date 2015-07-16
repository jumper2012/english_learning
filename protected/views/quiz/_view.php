<?php
/* @var $this QuizController */
/* @var $data Quiz */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('Quiz')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->judul_quiz), array('viewSoalQuiz', 'id'=>$data->id_quiz)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

        <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('durasi')); ?>:</b>
	<?php echo CHtml::encode($data->durasi); ?>
	<br />
        -->
        
        <?php if(!Yii::app()->user->name=='admin'){
            echo CHtml::Button('Attempt Quiz!',array('onClick'=>"location='index.php?r=quiz/viewSoalQuiz&id=$data->id_quiz'")); 
        }
     ?>
            
</div>