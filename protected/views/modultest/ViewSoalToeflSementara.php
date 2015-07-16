<?php

/* @var $this QuizController */
/* @var $model Toeflsoal */
error_reporting(0);
/*
$this->breadcrumbs = array(
    'Quizs' => array('index'),
    $model->id_modultest,
);
 * 
 */
if (Yii::app()->user->name == 'admin') {
    $this->menu = array(
        //      array('label' => 'List Quiz', 'url' => array('index','idTopik'=>$model->kuis_topik->id_topik)),
        array('label' => 'Create Soal TOEFL', 'url' => array('site/soalToefl', 'id' => $model->id_modultest)),
            //      array('label' => 'Update Quiz', 'url' => array('update', 'id' => $model->id_quiz)),
            //     array('label' => 'Delete Quiz', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_quiz), 'confirm' => 'Are you sure you want to delete this item?')),
            //      array('label' => 'Manage Quiz', 'url' => array('admin')),
        array('label' => 'Manage Soal', 'url' => array('soal/admin')),
    );
}
?>
<?php

//$koneksi_server= mysql_connect('localhost','root','');
//$database = mysql_select_db('toefl');

if ($_post['Submit_jawaban']) {
    echo "Sukses!!";
    if (count($_post['option'] < 1)) {
        echo "<BR>Anda belum menjawab soal satupun ";
    }
}

$this->renderPartial('_soal', array(
    'model' => $model,
    'hasil' => $hasil,
    'NextModul' => $NextModul,
    'UrutanModul' => $UrutanModul));
?>

