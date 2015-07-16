<?php
/* @var $this ToeflController */
/* @var $model Toefl */

$this->breadcrumbs=array(
	'Toefls'=>array('index'),
	$model->id_toefl=>array('view','id'=>$model->id_toefl),
	'Update',
);

$this->menu=array(
	array('label'=>'List Toefl', 'url'=>array('index')),
	array('label'=>'Create Toefl', 'url'=>array('create')),
	array('label'=>'View Toefl', 'url'=>array('view', 'id'=>$model->id_toefl)),
	array('label'=>'Manage Toefl', 'url'=>array('admin')),
);
?>

<h1>Update Toefl <?php echo $model->id_toefl; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>