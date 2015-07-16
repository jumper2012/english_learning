<?php
/* @var $this ModultestController */
/* @var $model Modultest */

$this->breadcrumbs=array(
	'Modultests'=>array('index'),
	$model->id_modulTest,
);

$this->menu=array(
	array('label'=>'List Modultest', 'url'=>array('index')),
	array('label'=>'Create Modultest', 'url'=>array('create')),
	array('label'=>'Update Modultest', 'url'=>array('update', 'id'=>$model->id_modulTest)),
	array('label'=>'Delete Modultest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_modulTest),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modultest', 'url'=>array('admin')),
);
?>

<h1>View Modultest #<?php echo $model->id_modulTest; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_modulTest',
		'nama_modulTest',
		'durasi',
		'id_toefl',
		'time_start',
		'time_end',
	),
)); ?>
