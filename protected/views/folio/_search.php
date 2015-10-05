<?php
/* @var $this FolioController */
/* @var $model Folio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lugar'); ?>
		<?php echo $form->textField($model,'lugar',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'psicologica'); ?>
		<?php echo $form->textField($model,'psicologica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tecnica'); ?>
		<?php echo $form->textField($model,'tecnica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entrevista'); ?>
		<?php echo $form->textField($model,'entrevista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puntaje'); ?>
		<?php echo $form->textField($model,'puntaje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->