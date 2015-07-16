<div id="soal">
    <?php echo "<form action='' method='post'>" ?>
    <table style="width:750px">
        <?php
        $id = 1;
        //echo $NextModul;
        $UrutanModul += 1;
        //echo $UrutanModul;
        //var_dump($model);
        ?>
        <input type="hidden" name="UrutanModul" value="<?php echo $UrutanModul; ?>" />
        <input type="hidden" name="NextModul" value="<?php echo $NextModul; ?>" />
        <?php
        foreach ($hasil as $f) {
            ?>
            <?php
            if ($f->idSoal->id_file != NULL) {
                ?><tr>
                    <td></td>
                    <td>
                        <?php
                        if (CHtml::encode(Soal::model()->namaWBS($f->idSoal->id_file)) == 'L') {
                            $fileData = CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file));
                            
                            if(strlen($fileData) > 6)
                            {
                                $this->widget('ext.mediaElement.MediaElementPortlet', array(
                                    'url' => Yii::app()->request->baseUrl . '/music/test/' . CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file)),
                                    'mimeType' => 'audio/mp3',
                                ));
                            }
                        } else if (CHtml::encode(Soal::model()->namaWBS($f->idSoal->id_file)) == "R") {
                            $fileData = CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file));
                            
                            if(strlen($fileData) > 6)
                            {
                                echo CHtml::link(CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file)), Yii::app()->baseUrl . '/document/test/' . CHtml::encode(Soal::model()->namaSubWBS($f->idSoal->id_file)));
                            }
                        }
                        ?>
                    </td>
                </tr><?php
                echo $data->file;
            }
                    ?>

            <tr style="width:5px">
                <td style="width:5px">
                    <?php echo $id . ". "; ?>
                </td>
                <td><?php
                if ($id > 1) {
                        ?><br><?php
            }
                    ?>            
                    <?php echo $f->idSoal->soal; ?>
                </td>                

            </tr>

            <input type="hidden" name="NomorSoal" value="<?php echo $id; ?>" />

            <tr>
                <td><input type="radio" name=jawaban[<?php echo $id; ?>]' id="<?php $id ?>" value="a"></td>
                <td><?php echo "A. " . $f->idSoal->a; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name=jawaban[<?php echo $id; ?>]' id="<?php $id ?>" value="b"></td>
                <td><?php echo "B. " . $f->idSoal->b; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name=jawaban[<?php echo $id; ?>]' id="<?php $id ?>" value="c"></td>
                <td><?php echo "C. " . $f->idSoal->c; ?></td>
            </tr>
            <tr>
                <td><input type="radio" name=jawaban[<?php echo $id; ?>]' id="<?php $id ?>" value="d"></td>
                <td><?php echo "D. " . $f->idSoal->d; ?></td>
            </tr>             
            <?php
            $id++;
        }
        ?>                
    </table>
    <?php
    echo "<input type='submit' name='Submit_jawaban_sementara' value='Next'/>";
    //echo CHtml::ajaxSubmitButton('Next', 'ViewSoalToefl',array('update' => '#soal'));
    echo "</form>";
    ?>
</div>