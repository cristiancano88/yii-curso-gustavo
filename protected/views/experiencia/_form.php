<?php
/* @var $this ExperienciaController */
/* @var $model Experiencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experiencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
		<?php echo $form->dropDownList($model,'usuario_id',CHtml::listData(Usuarios::model()->findAll(" estado = 1"),'id','nombre'),array('empty'=>'seleccione Usuario')); ?>
		<?php echo $form->error($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa'); ?>
		<?php echo $form->textField($model,'empresa',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php //echo $form->textField($model,'inicio'); 
                $this->widget('zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model'=>$model,
                        'attribute'=>'inicio',
                        'language' => 'es',
                        'options' => array(
                            'dateFormat'=>'yy-mm-dd',
                            'constrainInput' => 'false',
                            'duration'=>'fast',
                            'showAnim' =>'slide',
                        ),
                    )
                );
                
                ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finalizacion'); ?>
		<?php //echo $form->textField($model,'finalizacion'); 
                $this->widget('zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model'=>$model,
                        'attribute'=>'finalizacion',
                        'language' => 'es',
                        'options' => array(
                            'dateFormat'=>'yy-mm-dd',
                            'constrainInput' => 'false',
                            'duration'=>'fast',
//                            'showAnim' =>'slide',
                        ),
                    )
                );
                ?>
		<?php echo $form->error($model,'finalizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jefe'); ?>
		<?php echo $form->textField($model,'jefe',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'jefe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->