<?php
/* @var $this TopikController */
/* @var $model Topik */

$this->breadcrumbs=array(
	'Topiks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Topik', 'url'=>array('index')),
	array('label'=>'Manage Topik', 'url'=>array('admin')),
);
?>

<h1>Create Topic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>