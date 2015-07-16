<?php
/* @var $this UserController */
/* @var $model User */

/*
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);
 * 
 */
        if(Yii::app()->user->name=='admin'){
            $this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
       array('label'=>'Change Password', 'url'=>array('update2', 'id'=>$model->username)),
	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->username)),
	//array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete your Account?')),
        //array('label'=>'Manage User', 'url'=>array('admin')),
        );
        }
        else{
            $this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
        array('label'=>'Change Password', 'url'=>array('update2', 'id'=>$model->username)),
	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->username)),
	//array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete your Account?')),
    //	array('label'=>'Manage User', 'url'=>array('admin')),
        );
        }

?>

<h1><?php echo $model->username; ?></h1>
<table>
    <tr>
        <td>
            <img src="<?php echo Yii::app()->request->baseUrl . '/images/test/' . $model->foto;?>" width="150" height="200" />
        </td>
        <td>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'no_induk',
		'nama',
		'email',
		't_lahir',
		'gender',
		'alamat',
	),
)); ?>
            </td>
            
        </tr>
</table>