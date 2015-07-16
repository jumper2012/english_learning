<?php
/* @var $this ToeflController */
/* @var $model Toefl */

$this->breadcrumbs=array(
	'Toefls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TOEFL', 'url'=>array('index')),
	array('label'=>'Manage TOEFL', 'url'=>array('admin')),
);
?>

<h1>Create Toefl</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>