<?php
/* @var $this GradeController */
/* @var $data Grade */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grade')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grade), array('view', 'id'=>$data->id_grade)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jawaban')); ?>:</b>
	<?php echo CHtml::encode($data->jawaban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade')); ?>:</b>
	<?php echo CHtml::encode($data->grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />


</div>