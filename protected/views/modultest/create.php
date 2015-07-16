<?php
/* @var $this ModultestController */
/* @var $model Modultest */

$this->breadcrumbs=array(
	'Modultests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Modul', 'url'=>array('ViewModul', 'idToefl' => $idToefl)),
	array('label'=>'Manage Modul', 'url'=>array('admin', 'idToefl' => $idToefl)),
);
?>

<h1>Create Modultest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>