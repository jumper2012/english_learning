<?php
/* @var $this ModultestController */
/* @var $data Modultest */
?>

<div class="view">
        <?php echo CHtml::link(CHtml::encode($data->nama_modulTest), array('viewSoalToeflTest', 'id'=>$data->id_toefl)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('durasi')); ?>:</b>
	<?php echo CHtml::encode($data->durasi); ?> Minutes
	<br />
</div>