<?php
/* @var $this QuizController */
/* @var $model Quiz */
error_reporting(0);
$this->breadcrumbs = array(
    'Quiz' => array('index'),
    $model->id_quiz,
);
if(Yii::app()->user->name=='admin'){
        $this->menu=array(
        array('label' => 'List Quiz', 'url' => array('index','idTopik'=>$model->kuis_topik->id_topik)),
        array('label' => 'Create Soal', 'url' => array('site/soal', 'id' => $model->id_quiz)),
        //array('label' => 'Update Quiz', 'url' => array('update', 'id' => $model->id_quiz)),
        //array('label' => 'Delete Quiz', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_quiz), 'confirm' => 'Are you sure you want to delete this item?')),
        //array('label' => 'Manage Quiz', 'url' => array('admin')),
            array('label' => 'Manage Soal', 'url' => array('soal/admin')),
);}
        else{
            $this->menu=array(
        //array('label' => 'List Quizzes', 'url' => array('quiz/index', 'idTopik' => $model->kuis_topik->id_topik)),
	);

        }
?>
<?php
  //$koneksi_server= mysql_connect('localhost','root','');b
  //$database = mysql_select_db('toefl');
  
  if($_post['Submit_jawaban']){
      echo "Success!!!";
  if(count($_post['option']< 1)){
         echo "<BR>You haven't answered at least one question yet ";
  }      
  }  
?>




<?php echo "<form action='' method='post'>" ?>
<table style="width:750px">
      <?php
             $id = 1;
             foreach ($hasil as $f) {?>
             <?php
                 if($f->kuis_soal->id_file!=NULL)
   
                 {?><tr>
                     <td></td>
                     <td>
                         <?php
                            if(CHtml::encode(Soal::model()->namaWBS($f->kuis_soal->id_file))== 'L')
                            {
                                $this->widget('ext.mediaElement.MediaElementPortlet', array(
                                'url' => Yii::app()->request->baseUrl. '/music/test/'. CHtml::encode(Soal::model()->namaSubWBS($f->kuis_soal->id_file)),
                                'mimeType' => 'audio/mp3',                                                                   
                                ));
                            }
                            else if(CHtml::encode(Soal::model()->namaWBS($f->kuis_soal->id_file))== 'R')
                            {
                                $namaFile = CHtml::encode(Soal::model()->namaSubWBS($f->kuis_soal->id_file));
                                
                                if(strlen($namaFile) > 6)
                                {
                                    echo CHtml::link(CHtml::encode(Soal::model()->namaSubWBS($f->kuis_soal->id_file)), Yii::app()->baseUrl . '/document/test/'.CHtml::encode(Soal::model()->namaSubWBS($f->kuis_soal->id_file)));
                                }
                                //echo CHtml::link(CHtml::encode($data->file), Yii::app()->baseUrl . '/document/test/' . $data->file);
                                
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
                    <?php echo $f->kuis_soal->soal;?>
                </td>                
                
             </tr>
               
             <input type="hidden" name="NomorSoal" value="<?php echo $id; ?>" />
             
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="a"></td>
                 <td><?php echo "A. ".$f->kuis_soal->a;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="b"></td>
                 <td><?php echo "B. ".$f->kuis_soal->b;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="c"></td>
                 <td><?php echo "C. ".$f->kuis_soal->c;?></td>
             </tr>
             <tr>
                 <td><input type="radio" name=jawaban[<?php echo $id;?>]' id="<?php $id?>" value="d"></td>
                 <td><?php echo "D. ".$f->kuis_soal->d;?></td>
             </tr>             
             <?php
             $id++;
      }            
      
      ?>                
</table>
<?php echo "<input type='submit' name='Submit_jawaban' value='View Result'/>";
 echo "</form>";?>