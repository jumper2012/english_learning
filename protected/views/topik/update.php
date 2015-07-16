<?php
/* @var $this TopikController */
/* @var $model Topik */

$this->breadcrumbs=array(
	'Topiks'=>array('index'),
	$model->id_topik=>array('view','id'=>$model->id_topik),
	'Update',
);

$this->menu=array(
	array('label'=>'List Topik', 'url'=>array('index')),
	array('label'=>'Create Topik', 'url'=>array('create')),
	array('label'=>'View Topik', 'url'=>array('view', 'id'=>$model->id_topik)),
	array('label'=>'Manage Topik', 'url'=>array('admin')),
);
?>

<h1>Update Topic <?php echo $model->id_topik; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>