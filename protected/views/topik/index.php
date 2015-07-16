<?php
/* @var $this TopikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Topiks',
);
if(Yii::app()->user->name=='admin'){
$this->menu=array(
	array('label'=>'Create Topik', 'url'=>array('create', 'idModul'=>$dataProvider->id_modul)),
	array('label'=>'Manage Topik', 'url'=>array('admin')),
);}
?>

<h1>Topics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider->search(),
	'itemView'=>'_view',
)); ?>
