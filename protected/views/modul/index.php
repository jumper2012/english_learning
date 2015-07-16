<?php
/* @var $this ModulController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Modul',
);
if(Yii::app()->user->name=='admin'){
        $this->menu=array(
	array('label'=>'Create Modul', 'url'=>array('create')),
	array('label'=>'Manage Modul', 'url'=>array('admin')),
        //array('label'=>'Update Modules', 'url'=>array('update', 'id'=>$model->id_modul)),
);}
        else{
            $this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
        //array('label'=>'List Modul', 'url'=>array('index')),
//	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->username)),
//	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete your Account?')),
    //	array('label'=>'Manage User', 'url'=>array('admin')),
        );

        }

//$this->menu=array(
	
//);
?>

<h1>Modules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
