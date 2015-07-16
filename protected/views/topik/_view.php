<?php
/* @var $this TopikController */
/* @var $data Topik */
?>

<div class="view">

        <?php echo CHtml::link(CHtml::encode($data->judul_topik), array('view', 'idTopik'=>$data->id_topik)); ?>
	<br />
</div>