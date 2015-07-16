<?php
/* @var $this ModulController */
/* @var $model Modul */

$this->breadcrumbs=array(
	'Modul'=>array('index'),
	$model->id_modul,
);

if(Yii::app()->user->name=='admin'){
        $this->menu=array(
	array('label'=>'List Modul', 'url'=>array('index')),
	array('label'=>'Create Modul', 'url'=>array('create')),
	array('label'=>'Update Modul', 'url'=>array('update', 'id'=>$model->id_modul)),
	array('label'=>'Delete Modul', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_modul),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modul', 'url'=>array('admin')),
);}
        else{
            $this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
        //array('label'=>'List Modules', 'url'=>array('index')),
//	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->username)),
//	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete your Account?')),
    //	array('label'=>'Manage User', 'url'=>array('admin')),
        );

        }
?>

<h1>View Modules #<?php echo $model->id_modul; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_modul',
		'nama_modul',
		'deskripsi_modul',
	),
)); ?>
