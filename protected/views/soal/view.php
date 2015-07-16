<?php
/* @var $this SoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
	'Soal'=>array('index'),
	$model->id_soal,
);

$this->menu=array(
	array('label'=>'List Soal', 'url'=>array('index')),
	array('label'=>'Create Soal', 'url'=>array('create')),
	array('label'=>'Update Soal', 'url'=>array('update', 'id'=>$model->id_soal)),
	array('label'=>'Delete Soal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_soal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Soal', 'url'=>array('admin')),
);
?>

<h1>View Questions #<?php echo $model->id_soal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_soal',
		'soal',
		'id_file',
		'jawaban',
		'a',
		'b',
		'c',
		'd',
		'e',
		'order',
	),
)); ?>
