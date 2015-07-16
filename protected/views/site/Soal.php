<?php
$this->pageTitle = Yii::app()->name . ' - Soal';
$this->breadcrumbs = array(
    'Soal',
);
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'soal-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'soal'); ?>
        <BR>
        <?php $this->widget('ext.wdueditor.WDueditor',
            array(
                'model' => $model,
                'attribute' => 'soal',
                'language' => 'en'
                ));?>
            <BR>
        <?php echo $form->error($model, 'soal'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>        
        <?php echo CHtml::activeFileField($model, 'file'); ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jenis'); ?>
        <?php
        echo $form->radioButtonList($model, 'jenis', array(
            'L' => 'Listening',
            'R' => 'Reading',), array(
            'labelOptions' => array('style' => 'display:inline'), // add this code
            'separator' => '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',
        ));
        ?>
        <?php echo $form->error($model, 'jenis'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jawaban'); ?>
        <?php
        echo $form->radioButtonList($model, 'jawaban', array(
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
            'e' => 'e'), array(
            'labelOptions' => array('style' => 'display:inline'), // add this code
            'separator' => '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',
        ));
        ?>
        <?php echo $form->error($model, 'jawaban'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'a'); ?>
        <?php echo $form->textField($model, 'a', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'a'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'b'); ?>
        <?php echo $form->textField($model, 'b', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'b'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'c'); ?>
        <?php echo $form->textField($model, 'c', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'c'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'd'); ?>
        <?php echo $form->textField($model, 'd', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'd'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'e'); ?>
        <?php echo $form->textField($model, 'e', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'e'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'order'); ?>
        <?php echo $form->textField($model, 'order'); ?>
        <?php echo $form->error($model, 'order'); ?>
    </div>

<div class="row buttons"> 
<?php echo CHtml::submitButton('Create Soal');?> 
</div>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->
