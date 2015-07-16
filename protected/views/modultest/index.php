<?php
/* @var $this ModultestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Modultests',
);

if (Yii::app()->user->name == 'admin') {
    $this->menu=array(
	array('label'=>'Create Modul', 'url'=>array('create', 'idToefl'=>$dataProvider->id_toefl)),
	array('label'=>'Manage Modul', 'url'=>array('admin', 'idToefl'=>$dataProvider->id_toefl)),
    );
} else {
    $this->menu = array(
        array('label' => 'List Toefl', 'url' => array('toefl/index')),
    );
}
?>

<h1>Moduls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider->search(),
	'itemView'=>'_view',
)); ?>
