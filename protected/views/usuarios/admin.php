<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs = array(
    'Usuarioses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Usuarios', 'url' => array('index')),
    array('label' => 'Create Usuarios', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuarioses</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
//--Crear widget
echo '<br><br>';
echo CHtml::link('Pincha Aqui', '#', array('onClick' => "alert('OOpss!! pinchastes jejeje')"));
echo '<br>';

//widget personalizado, el codigo esta en "protected/extensions/alert/GAlert.php"
$mensaje="Hola je je";
$this->widget('ext.alert.GAlert',array('mensaje'=>$mensaje));echo '<br>';
$this->widget('ext.alert.GAlert');//tambien se puede utilizar sin parametros y coge el mensaje por defecto
//--fin crear widget

//codigo por defecto
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'usuarios-grid',
//    'dataProvider' => $model->search(),
//    'filter' => $model,
//    'columns' => array(
//        'id',
//        'ciudad_id',
//        'nombre',
//        'email',
//        array(
//            'name' => 'estado',
//            'value' => '$data->nombre_estado()',
//        ),
//        'identificacion',
//        array(
//            'name' => 'genero',
//            'header' => 'Genero',
//            'value' => 'Usuarios::getGenero($data->genero)',
//            'filter' => Usuarios::getGenero(), // o un array
//        ),
//        array(
//            'class' => 'CButtonColumn',
//        ),
//    ),
//));

//---------------------
//codigo del video

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'usuarios-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxUpdate' => false,
    'columns' => array(
        'id',
        array(
            'name' => 'ciudad_id',
            'value' => '$data->ciudad->nombre',
            'filter' => Usuarios::getListCiudad(),
        ),
        'nombre',
        'identificacion',
        'email',
        'estado',
        array(
            'name' => 'mi_campo',
            'type' => 'raw', // o 'type'=>'html', o 'type'=>'date'  'type'=>'datetame'
            'value' => 'strtoupper($data->nombre." ".$data->email)',
        ),
        array(
            'name' => 'genero',
            'header' => 'Genero',
            'value' => 'Usuarios::getGenero($data->genero)',
            'filter' => Usuarios::getGenero(), // o un array
            //'filter' => CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre'),
        ),
        array(
            'name' => 'estado',
            'value' => '$data->nombre_estado()',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Modificar',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("elaboracion/orden",array("id"=>$data->id))',
            'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
            'deleteConfirmation' => 'Esta seguro que desea borrar el registro seleccionado?',
            'viewButtonImageUrl' => Yii::app()->request->baseUrl . '/images/021.png',
            'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/017.png',
            'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/004.png',
            'htmlOptions' => array('style' => 'width:300px!important'),
            'headerHtmlOptions' => array('style' => 'width:300px!important'),
            'template' => '{delete} {update} {view}',
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'Email',
            'imageUrl' => Yii::app()->baseUrl . '/images/029.png',
            'labelExpression' => '$data->email',
            'urlExpression' => '"mailto://".$data->email',
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
    ),
));