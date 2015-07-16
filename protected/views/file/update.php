<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->id_file=>array('view','id'=>$model->id_file),
	'Update',
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'View File', 'url'=>array('view', 'id'=>$model->id_file)),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>Update File <?php echo $model->id_file; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>