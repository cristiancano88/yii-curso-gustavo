<?php
/* @var $this VacantesController */
/* @var $model Vacantes */

$this->breadcrumbs=array(
	'Vacantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vacantes', 'url'=>array('index')),
	array('label'=>'Manage Vacantes', 'url'=>array('admin')),
);
?>

<h1>Create Vacantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>