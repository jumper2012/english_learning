<?php
$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    'Register',
);
?> 
<h1>Register</h1> 
<p>Please fill out the following form to register</p> 
<!-- form --> 
<div class="form"> 
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registration-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            ));
    ?> 
    <p class="note">Fields with <span class="required">*</span> are 
        required.</p> 
    <?php echo $form->errorSummary($model); ?> 
    <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'NoInduk'); ?>
		<?php echo $form->textField($model,'NoInduk'); ?>
		<?php echo $form->error($model,'NoInduk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'date_of_birth',
                    'value' => $model->date_of_birth,
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
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>
        
        <div class="row">
                <?php echo $form->labelEx($model, 'foto'); ?>
                <?php echo "Upload book's image","<br>" ?>
                <?php echo CHtml::activeFileField($model, 'foto'); ?>
                <?php echo $form->error($model, 'foto'); ?>
         </div>

        <?php //if ($model->isNewRecord != '1') { ?>
        <div class="row">
            <?php echo CHtml::Image(Yii::app()->request->baseUrl . '/foto/' . $model->foto, "foto", array("width" => 200)); ?>  
<!--            Image shown here if page is update page-->
        </div>
    <?php //}?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model,'sex',User::gender(),
                        array('prompt' => '- Choose -',
                              'style' => 'width: 200px; ')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div> 
    <div class="row buttons"> 
        <?php echo CHtml::submitButton('Register');?>
    </div> 
    <?php $this->endWidget(); ?> 
</div><!-- form -->