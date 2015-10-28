<?php

//Video "43 Yii Framework en Espanol PHP ACCIONES FILTROS Y CONTROLADOR PARTE 1"
//Esta clase es la que hereda la accion "Estado" del controllador "UsuariosController"
//El nombre de la clase puede ser cualquiera pero este tipo de clases deben de heredar de "CAction"
class EstadoAction extends CAction { 

    public $model = null;
    public $redirect = 'index';
    public $campo = 'estado';

    function run() {
        if (empty($_GET['id']))
            throw new CHttpException(404);

//        $model = Usuarios::model()->findByPk($_GET['id']);
        $model = CActiveRecord::model($this->model)->findByPk($_GET['id']);
        if ($model === null)
            throw new CHttpException(404);
        
        $model->{$this->campo} = $model->{$this->campo} == 1 ? 0 : 1;

        if ($model->update()) {
//            $this->redirect('index');
            $this->controller->redirect(array($this->redirect));
        }

        throw new CHttpException(500);
    }

}
