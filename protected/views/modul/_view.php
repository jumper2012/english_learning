<?php
/* @var $this ModulController */
/* @var $data Modul */
?>

<div class="view">
    
	
	<?php echo CHtml::link(CHtml::encode($data->nama_modul), array('topik/ViewTopic', 'idModul'=>$data->id_modul)); ?>
	<br />

	<b><?php echo CHtml::encode("Deskripsi"); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi_modul); ?>
	<br />


</div>