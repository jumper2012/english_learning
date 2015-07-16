<?php
/* @var $this SoalController */
/* @var $data Soal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_soal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_soal), array('view', 'id'=>$data->id_soal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soal')); ?>:</b>
	<?php echo CHtml::encode($data->soal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_file')); ?>:</b>
	<?php echo CHtml::encode($data->id_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jawaban')); ?>:</b>
	<?php echo CHtml::encode($data->jawaban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a')); ?>:</b>
	<?php echo CHtml::encode($data->a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b')); ?>:</b>
	<?php echo CHtml::encode($data->b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c')); ?>:</b>
	<?php echo CHtml::encode($data->c); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('d')); ?>:</b>
	<?php echo CHtml::encode($data->d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('e')); ?>:</b>
	<?php echo CHtml::encode($data->e); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
	<?php echo CHtml::encode($data->order); ?>
	<br />

	

</div>