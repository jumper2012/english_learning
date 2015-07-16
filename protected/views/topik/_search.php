<?php
/* @var $this TopikController */
/* @var $model Topik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_topik'); ?>
		<?php echo $form->textField($model,'id_topik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'judul_topik'); ?>
		<?php echo $form->textField($model,'judul_topik',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'materi_topik'); ?>
		<?php echo $form->textField($model,'materi_topik',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_modul'); ?>
		<?php echo $form->textField($model,'id_modul'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->