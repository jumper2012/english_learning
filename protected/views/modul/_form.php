<?php
/* @var $this ModulController */
/* @var $model Modul */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modul-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_modul'); ?>
		<?php echo $form->textField($model,'nama_modul',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_modul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi_modul'); ?>
		<?php echo $form->textField($model,'deskripsi_modul',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'deskripsi_modul'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->