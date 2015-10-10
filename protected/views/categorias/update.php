<?php
/* @var $this CategoriasController */
/* @var $model Categorias */

$this->breadcrumbs=array(
	'Categoriases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//las siguientes lineas las modifique en el video: "19 YII Framework en Español PHP PERSONALIZAR GENERADOR DE CODIGO PARTE 2"
        
        array('label'=>Yii::t('app','List').' Categorias', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create').' Categorias', 'url'=>array('create')),
	array('label'=>Yii::t('app','View').' Categorias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage').' Categorias', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Update');?>Categorias <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>