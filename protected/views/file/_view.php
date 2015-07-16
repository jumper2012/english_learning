<?php
/* @var $this FileController */
/* @var $data File */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_file')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_file), array('view', 'id'=>$data->id_file)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />

        <b>
            <?php 
                if($data->jenis=="L")
                {
                    $this->widget('ext.mediaElement.MediaElementPortlet', array(
                        'url' => Yii::app()->request->baseUrl. '/music/test/'. $data->file,
                        'mimeType' => 'audio/mp3',
                    ));
                }
                else if($data->jenis=="R")
                {
                    echo CHtml::link(CHtml::encode($data->file), Yii::app()->baseUrl . '/document/test/' . $data->file);
                }
            ?>
        </b>

</div>