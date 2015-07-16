<?php
/* @var $this ToeflController */
/* @var $model Toefl */

$this->breadcrumbs=array(
	'Toefls'=>array('index'),
	$model->id_toefl,
);

$this->menu=array(
	array('label'=>'List Toefl', 'url'=>array('index')),
	array('label'=>'Create Toefl', 'url'=>array('create')),
	array('label'=>'Update Toefl', 'url'=>array('update', 'id'=>$model->id_toefl)),
	array('label'=>'Delete Toefl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_toefl),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Toefl', 'url'=>array('admin')),
);
?>

<h1>View Toefl #<?php echo $model->id_toefl; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_toefl',
		'judul',
		'deskripsi',
	),
)); ?>
