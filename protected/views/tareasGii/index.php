<?php
/* @var $this TareasGiiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tareas Giis',
);

$this->menu=array(
	array('label'=>'Create TareasGii', 'url'=>array('create')),
	array('label'=>'Manage TareasGii', 'url'=>array('admin')),
);
?>

<h1>Tareas Giis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
