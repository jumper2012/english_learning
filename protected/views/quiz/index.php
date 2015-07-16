<?php
/* @var $this QuizController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quiz',
);
if(Yii::app()->user->name=='admin'){
$this->menu=array(
	//array('label'=>'Create Quiz', 'url'=>array('create')),
	array('label'=>'Manage Quiz', 'url'=>array('admin', 'idTopik'=>$dataProvider->id_topik)),
);}
?>

<h1>Quiz</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider->search(),
	'itemView'=>'_view',
)); ?>
