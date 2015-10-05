<?php
/* @var $this TareasGiiController */
/* @var $model TareasGii */

$this->breadcrumbs=array(
	'Tareas Giis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TareasGii', 'url'=>array('index')),
	array('label'=>'Manage TareasGii', 'url'=>array('admin')),
);
?>

<h1>Create TareasGii</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>