<?php
/* @var $this ModultestController */
/* @var $model Modultest */

$this->breadcrumbs=array(
	'Modultests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Modul', 'url'=>array('ViewModul', 'idToefl' => $model->id_toefl)),
	array('label'=>'Create Modul', 'url'=>array('create', 'idToefl' => $model->id_toefl)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#modultest-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Modultests</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'modultest-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_modulTest',
		'nama_modulTest',
		'durasi',
		'id_toefl',
		'time_start',
		'time_end',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
