<?php
/* @var $this ExperienciaController */
/* @var $model Experiencia */

$this->breadcrumbs=array(
	'Experiencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Experiencia', 'url'=>array('index')),
	array('label'=>'Create Experiencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#experiencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Experiencias</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'experiencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'usuario_id',
		'empresa',
		'inicio',
		'finalizacion',
		'jefe',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
