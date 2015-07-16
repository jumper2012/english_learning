<?php
/* @var $this ModulController */
/* @var $model Modul */

$this->breadcrumbs=array(
	'Modul'=>array('index'),
	$model->id_modul=>array('view','id'=>$model->id_modul),
	'Update',
);

$this->menu=array(
	array('label'=>'List Modul', 'url'=>array('index')),
	array('label'=>'Create Modul', 'url'=>array('create')),
	array('label'=>'View Modul', 'url'=>array('view', 'id'=>$model->id_modul)),
	array('label'=>'Manage Modul', 'url'=>array('admin')),
);
?>

<h1>Update Module <?php echo $model->id_modul; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>