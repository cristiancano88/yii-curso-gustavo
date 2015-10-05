<?php
/* @var $this TareasGiiController */
/* @var $model TareasGii */

$this->breadcrumbs=array(
	'Tareas Giis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TareasGii', 'url'=>array('index')),
	array('label'=>'Create TareasGii', 'url'=>array('create')),
	array('label'=>'View TareasGii', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TareasGii', 'url'=>array('admin')),
);
?>

<h1>Update TareasGii <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>