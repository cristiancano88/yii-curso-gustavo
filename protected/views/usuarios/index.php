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
//codigo colocado en el video (48 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 2)
//esto para extraer informacion del usuario logueado
echo '<strong>Informacion del usuario logueado</strong> <br>';
echo 'id del usuario logueado: '. Yii::app()->user->id.'<br>';
echo 'username del usuario logueado: '. Yii::app()->user->name.'<br>';
echo 'nombre del usuario logueado: '. Yii::app()->user->getState('nombre').'<br>';
echo 'identificacion del usuario logueado: '. Yii::app()->user->getState('identificacion').'<br><br>';
//fin codigo colocado en el video (48 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 2)
?>


<?php
$var = 10;
echo '<strong>Ejemplo de palabras traducidas</strong> <br>';
echo Yii::t('app', "Save # {VAR}", array('{VAR}' => $var)) .'<br>';
echo Yii::t('app', "Name") .'<br>';
echo Yii::t('app', "Save") .'<br><br>';
?>
<h1>Usuarioses</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
