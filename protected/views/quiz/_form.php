<?php
/* @var $this QuizController */
/* @var $model Quiz */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quiz-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Quiz'); ?>
		<?php echo $form->textField($model,'judul_quiz',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'judul_quiz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'durasi'); ?>
		<?php echo $form->textField($model,'durasi'); ?> Format : HH:MM:SS
		<?php echo $form->error($model,'durasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_start'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'time_start',
                        'value' => $model->time_start,
                        'options' => array(
                            'dateFormat' => 'yy-mm-dd',
                            'showOn' => 'button',
                            'yearRange' => '-60',
                            'changeMonth' => 'ture',
                            'changeYear' => 'true',
                            'constrainInput' => 'false',
                            'duration' => 'fast',
                            'showAnim' => 'slide',
                        ),
                        'htmlOptions' => array('size' => 20),
                    )); ?>
		<?php echo $form->error($model,'time_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_end'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'time_end',
                        'value' => $model->time_end,
                        'options' => array(
                            'dateFormat' => 'yy-mm-dd',
                            'showOn' => 'button',
                            'yearRange' => '-60',
                            'changeMonth' => 'ture',
                            'changeYear' => 'true',
                            'constrainInput' => 'false',
                            'duration' => 'fast',
                            'showAnim' => 'slide',
                        ),
                        'htmlOptions' => array('size' => 20),
                    )); ?>
		<?php echo $form->error($model,'time_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->