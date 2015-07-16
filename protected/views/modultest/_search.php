<?php
/* @var $this ModultestController */
/* @var $model Modultest */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_modulTest'); ?>
		<?php echo $form->textField($model,'id_modulTest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_modulTest'); ?>
		<?php echo $form->textField($model,'nama_modulTest',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'durasi'); ?>
		<?php echo $form->textField($model,'durasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_toefl'); ?>
		<?php echo $form->textField($model,'id_toefl'); ?>
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