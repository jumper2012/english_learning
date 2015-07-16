<?php
/* @var $this ModulController */
/* @var $model Modul */

$this->breadcrumbs=array(
	'Modul'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Modul', 'url'=>array('index')),
	array('label'=>'Manage Modul', 'url'=>array('admin')),
);
?>

<h1>Create Modul</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>