<?php
/* @var $this QuizController */
/* @var $model Quiz */

$this->breadcrumbs=array(
	'Quiz'=>array('index'),
	$model->id_quiz,
);

$this->menu=array(
	array('label'=>'List Quiz', 'url'=>array('index')),
	array('label'=>'Create Quiz', 'url'=>array('create')),
	array('label'=>'Update Quiz', 'url'=>array('update', 'id'=>$model->id_quiz)),
	array('label'=>'Delete Quiz', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_quiz),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quiz', 'url'=>array('admin')),
);
?>

<h1>View Quiz #<?php echo $model->id_quiz; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_quiz',
		'id_topik',
		'judul_quiz',
		'deskripsi',
		'durasi',
		'time_start',
		'time_end',
	),
)); ?>
