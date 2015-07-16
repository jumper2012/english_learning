<?php
/* @var $this GradeController */
/* @var $model Grade */

$this->breadcrumbs=array(
	'Grades'=>array('index'),
	$model->id_grade=>array('view','id'=>$model->id_grade),
	'Update',
);

$this->menu=array(
	array('label'=>'List Grade', 'url'=>array('index')),
	array('label'=>'Create Grade', 'url'=>array('create')),
	array('label'=>'View Grade', 'url'=>array('view', 'id'=>$model->id_grade)),
	array('label'=>'Manage Grade', 'url'=>array('admin')),
);
?>

<h1>Update Grade <?php echo $model->id_grade; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>