<?php
/* @var $this ExperienciaController */
/* @var $model Experiencia */

$this->breadcrumbs=array(
	'Experiencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Experiencia', 'url'=>array('index')),
	array('label'=>'Manage Experiencia', 'url'=>array('admin')),
);
?>

<h1>Create Experiencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>