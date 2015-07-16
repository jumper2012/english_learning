<?php
/* @var $this QuizController */
/* @var $model Quiz */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_quiz'); ?>
		<?php echo $form->textField($model,'id_quiz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_topik'); ?>
		<?php echo $form->textField($model,'id_topik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'judul_quiz'); ?>
		<?php echo $form->textField($model,'judul_quiz',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'durasi'); ?>
		<?php echo $form->textField($model,'durasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_start'); ?>
		<?php echo $form->textField($model,'time_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_end'); ?>
		<?php echo $form->textField($model,'time_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->