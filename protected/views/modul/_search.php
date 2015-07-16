<?php
/* @var $this ModulController */
/* @var $model Modul */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_modul'); ?>
		<?php echo $form->textField($model,'id_modul'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_modul'); ?>
		<?php echo $form->textField($model,'nama_modul',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi_modul'); ?>
		<?php echo $form->textField($model,'deskripsi_modul',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->