<?php
/* @var $this TareasGiiController */
/* @var $model TareasGii */

$this->breadcrumbs=array(
	'Tareas Giis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TareasGii', 'url'=>array('index')),
	array('label'=>'Create TareasGii', 'url'=>array('create')),
	array('label'=>'Update TareasGii', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TareasGii', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TareasGii', 'url'=>array('admin')),
);
?>

<h1>View TareasGii #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
	),
)); ?>
