<?php
/* @var $this QuizController */
/* @var $model Quiz */

$this->breadcrumbs=array(
	'Quiz'=>array('index'),
	$model->id_quiz=>array('view','id'=>$model->id_quiz),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quiz', 'url'=>array('index', 'idTopik' => $model->id_topik)),
	array('label'=>'Create Quiz', 'url'=>array('CreateQuiz', 'idTopik' => $model->id_topik)),
	//array('label'=>'View Quiz', 'url'=>array('view', 'id'=>$model->id_quiz)),
	array('label'=>'Manage Quiz', 'url'=>array('admin', 'idTopik' => $model->id_topik)),
);
?>

<h1>Update Quiz <?php echo $model->id_quiz; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>