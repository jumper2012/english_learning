<?php
/* @var $this SoalController */
/* @var $model Soal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'soal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'soal'); ?>
		<?php echo $form->textField($model,'soal',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'soal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_file'); ?>
		<?php echo $form->textField($model,'id_file'); ?>
		<?php echo $form->error($model,'id_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jawaban'); ?>
		<?php echo $form->textField($model,'jawaban',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'jawaban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a'); ?>
		<?php echo $form->textField($model,'a',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b'); ?>
		<?php echo $form->textField($model,'b',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c'); ?>
		<?php echo $form->textField($model,'c',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d'); ?>
		<?php echo $form->textField($model,'d',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'e'); ?>
		<?php echo $form->textField($model,'e',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'e'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->