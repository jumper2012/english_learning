<?php
/* @var $this TopikController */
/* @var $model Topik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'judul_topik'); ?>
		<?php echo $form->textField($model,'judul_topik',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'judul_topik'); ?>
	</div>
        
        <!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'materi_topik'); ?>
		<?php echo $form->textField($model,'materi_topik',array('size'=>60,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'materi_topik'); ?>
	</div>
        -->
        <div class="row">
            <!-- <p class="note">Ringkasan</p>-->
            <?php echo $form->labelEx($model,'materi_topik'); ?>
            <BR><BR>
            <?php $this->widget('ext.wdueditor.WDueditor',
                    array(
                        'model' => $model,
                        'attribute' => 'materi_topik',
                        'language' => 'en'
                    ));?>
            <BR>
            <?php echo $form->error($model,'materi_topik'); ?>
        </div>
        
        <!--
	<div class="row">
		<?php echo $form->labelEx($model,'id_modul'); ?>
		<?php echo $form->dropDownList($model,'id_modul', CHtml::listData(Modul::model()->findAll(), 'id_modul', 'nama_modul')); ?>
		<?php echo $form->error($model,'id_modul'); ?>
	</div>
        -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->