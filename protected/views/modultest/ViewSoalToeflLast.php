<h1>This is Reading Comprehension  Section</h1>
<?php
/* @var $this QuizController */
/* @var $model Toeflsoal */

error_reporting(0);
$this->breadcrumbs = array(
    'Quizs' => array('index'),
    $model->id_modultest,
);
if(Yii::app()->user->name=='admin'){
        $this->menu=array(
  //      array('label' => 'List Quiz', 'url' => array('index','idTopik'=>$model->kuis_topik->id_topik)),
        array('label' => 'Create Soal TOEFL', 'url' => array('site/soalToefl', 'id' => $model->id_modultest)),
  //      array('label' => 'Update Quiz', 'url' => array('update', 'id' => $model->id_quiz)),
   //     array('label' => 'Delete Quiz', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_quiz), 'confirm' => 'Are you sure you want to delete this item?')),
  //      array('label' => 'Manage Quiz', 'url' => array('admin')),
);}
        else{
            $this->menu=array(
        array('label' => 'List Quiz', 'url' => array('index')),
	);

        }
?>
<?php
  //$koneksi_server= mysql_connect('localhost','root','');
  //$database = mysql_select_db('toefl');
  
  if($_post['Submit_jawaban']){
      echo "Sukses!!";
  if(count($_post['option']< 1)){
         echo "<BR>Anda belum menjawab soal satupun ";
  }      
  } 
  ?>




<?php echo "<form action='' method='post'>" ?>
<table style="width:750px">
      <?php
             $id = 1;
             foreach ($hasil as $f) {?>
             <?php
                 if($f->idSoal->id_file!=NULL)
                 {?><tr>
                     <td></td>
                     <td>
                         <?php echo CHtml::encode(Soal::model()->namaWBS($f->idSoal->id_file));
                         echo Soal::model()->namaSubWBS($f->idSoal->id_file);
                         ?>
                         <?php
                           if(CHtml::encode(Soal::model()->namaWBS($f->idSoal->id_file))=='L')
                            {
                                $this->widget('ext.mediaElement.MediaElementPortlet', array(
                                'url' => Yii::app()->request->baseUrl. '/music/test/'. CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file)),
                                'mimeType' => 'audio/mp3',                                                                   
                            ));}
                    
                             else if(CHtml::encode(Soal::model()->namaWBS($f->idSoal->id_file))=="R")
                            {
                                 echo CHtml::link(CHtml::encode($data->file), Yii::app()->baseUrl . '/document/test/' .Soal::model()->namaSubWBS($f->idSoal->id_file));
                            } 
                         
                         
                         ?>
                 </td>
                 </tr><?php
                 echo $data->file;
                 }
             ?>
                 
             <tr style="width:5px">
                <td style="width:5px">
                    <?php echo $id . ". ";?>
                </td>
                <td><?php
                    if($id>1)
                    {
                        ?><br><?php
                    }
                    ?>            
                    <?php echo $f->idSoal->soal;?>
                </td>                
                
             </tr>
               
             <input type="hidden" name="NomorSoal" value="<?php echo $id; ?>" />
             
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="a"></td>
                 <td><?php echo "A. ".$f->idSoal->a;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="b"></td>
                 <td><?php echo "B. ".$f->idSoal->b;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="c"></td>
                 <td><?php echo "C. ".$f->idSoal->c;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="d"></td>
                 <td><?php echo "D. ".$f->idSoal->d;?></td>
             </tr>             
             <?php
             $id++;
      }            
      
      ?>                
</table>
<?php echo "<input type='submit' name='Submit_jawaban_final' value='Submit'/>";
 echo "</form>";?>