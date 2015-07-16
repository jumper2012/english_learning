<?php
/* @var $this TopikController */
/* @var $model Topik */

$this->breadcrumbs=array(
	'Topiks'=>array('index'),
	$model->judul_topik,
);
if(Yii::app()->user->name=='admin'){
$this->menu=array(
	array('label'=>'List Topik', 'url'=>array('topik/ViewTopic', 'idModul'=>$model->id_modul)),
	//array('label'=>'Create Topik', 'url'=>array('create')),
	array('label'=>'Update Topik', 'url'=>array('update', 'id'=>$model->id_topik)),
	array('label'=>'Delete Topik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_topik),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Topik', 'url'=>array('admin')),
        array('label'=>'Create Quiz', 'url'=>array('quiz/CreateQuiz', 'idTopik' => $model->id_topik)),
);
//$this->menu=array(
//    array('label'=>'Create Quiz', 'url'=>array('quiz/CreateQuiz', 'idTopik' => $model->id_topik)),
//);
}
?>

<h1><?php echo $model->judul_topik; ?></h1>

<?php echo $model->materi_topik; ?>
<BR><BR>

<?php
if (Yii::app()->user->name == 'admin') {
    ?>
    <p align="center"><?php echo CHtml::button('Manage Quiz', array('submit' => array('quiz/admin', 'idTopik' => $model->id_topik))); ?></p>
    <?php
} else {
    ?>
    <p align="center"><?php echo CHtml::button('View Quiz!', array('submit' => array('quiz/index', 'idTopik' => $model->id_topik))); ?></p>    
    <?php
}
?>

