<?php
/* @var $this FolioController */
/* @var $model Folio */

$this->breadcrumbs=array(
	'Folios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Folio', 'url'=>array('index')),
	array('label'=>'Manage Folio', 'url'=>array('admin')),
);
?>

<h1>Create Folio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>