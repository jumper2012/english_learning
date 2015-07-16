<?php
/* @var $this SoalController */
/* @var $model Soal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_soal'); ?>
		<?php echo $form->textField($model,'id_soal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'soal'); ?>
		<?php echo $form->textField($model,'soal',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_file'); ?>
		<?php echo $form->textField($model,'id_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jawaban'); ?>
		<?php echo $form->textField($model,'jawaban',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a'); ?>
		<?php echo $form->textField($model,'a',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b'); ?>
		<?php echo $form->textField($model,'b',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c'); ?>
		<?php echo $form->textField($model,'c',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d'); ?>
		<?php echo $form->textField($model,'d',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'e'); ?>
		<?php echo $form->textField($model,'e',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->