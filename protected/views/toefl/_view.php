<?php
/* @var $this ToeflController */
/* @var $data Toefl */
?>

<div class="view">
<?php if(Yii::app()->user->name=='admin')  
{ 
    echo CHtml::link(CHtml::encode($data->judul), array('modultest/ViewModul', 'idToefl'=>$data->id_toefl)); 
}
else
{
    echo CHtml::link(CHtml::encode($data->judul), array('modultest/ViewSoalToeflTest', 'id'=>$data->id_toefl)); 
}
?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />


</div>