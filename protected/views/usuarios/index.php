<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Usuarioses',
);

$this->menu = array(
    array('label' => 'Create Usuarios', 'url' => array('create')),
    array('label' => 'Manage Usuarios', 'url' => array('admin')),
);
?>

<?php
$var = 10;
echo Yii::t('app', "Save # {VAR}", array('{VAR}' => $var)) .'<br>';
echo Yii::t('app', "Name") .'<br>';
echo Yii::t('app', "Save") .'<br>';
?>
<h1>Usuarioses</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
