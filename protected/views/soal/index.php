<?php
/* @var $this SoalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Soal',
);

$this->menu=array(
	array('label'=>'Create Soal', 'url'=>array('create')),
	array('label'=>'Manage Soal', 'url'=>array('admin')),
);
?>

<h1>Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
