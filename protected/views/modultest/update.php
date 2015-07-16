<?php
/* @var $this ModultestController */
/* @var $model Modultest */

$this->breadcrumbs=array(
	'Modultests'=>array('index'),
	$model->id_modulTest=>array('view','id'=>$model->id_modulTest),
	'Update',
);

$this->menu=array(
	array('label'=>'List Modul', 'url'=> array('ViewModul', 'idToefl' => $model->id_toefl)),
	array('label'=>'Create Modul', 'url'=>array('create', 'idToefl' => $model->id_toefl)),
	//array('label'=>'View Modul', 'url'=>array('view', 'id'=>$model->id_modulTest)),
	array('label'=>'Manage Modul', 'url'=>array('admin', 'idToefl' => $model->id_toefl)),
);
?>

<h1>Update Modul</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>