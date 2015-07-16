<?php
/* @var $this ToeflController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Toefls',
);

if(Yii::app()->user->name=='admin')
{
    $this->menu=array(
	array('label'=>'Create TOEFL', 'url'=>array('create')),
	array('label'=>'Manage TOEFL', 'url'=>array('admin')),
    );
}
?>

<h1>TOEFL Test</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
