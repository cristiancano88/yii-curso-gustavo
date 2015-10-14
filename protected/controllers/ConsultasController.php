<?php

class ConsultasController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionIndex() {
        //--------------Usuario---------------------
        
        //buscar la primera fila que cumpla con la condicidion, siempre va traer un registro
//        $usuario = Usuarios::model()->find("estado = 1");
        
        //buscar la primera fila donde la clave primaria sea igual al parametro
        $usuario = Usuarios::model()->findByPk(2);
        
        //buscar la primera fila que cumpla con los parametros de $atributes, siempre va traer un registro
//        $usuario = Usuarios::model()->findByAttributes(array('estado'=>'1', 'genero'=>'H'));
        
        //buscar la primera fila que arroje el sql ingresado, siempre va traer un registro
//        $sql = "SELECT * FROM usuarios WHERE genero = 'M' ";
//        $usuario = Usuarios::model()->findBySql($sql);
        
        //--------------Usuarios----------------------
        
        //buscar las filas que cumpla con la condicidion
        $usuarios = Usuarios::model()->findAll("estado = 1");
        
        //buscar las fila donde las claves primarias sean igual al parametro
//        $usuarios = Usuarios::model()->findAllByPk(array(2,3));
        
        //buscar las filas que cumplan con los parametros de $atributes
//        $usuarios = Usuarios::model()->findAllByAttributes(array('estado'=>'1', 'genero'=>'H'));
        
        //buscar las fila que arroje el sql ingresado
//        $sql = "SELECT * FROM usuarios WHERE genero = 'M' ";
//        $usuarios = Usuarios::model()->findAllBySql($sql);
        
        //--------------Criteria----------------------
        
        $criteria = new CDbCriteria;
//        $criteria->compare('email', 'gmai', true); //cuando es true la linea es un "like" osea "WHERE estado LIKE 1"
//        $criteria->addInCondition('t.id', array(2,3)); //esto es una clausula IN en SQL
//        $criteria->addNotInCondition('t.id', array(2,3)); //esto es una clausula NOT en SQL
//        $criteria->addBetweenCondition('t.id', 1,2); //esto es una clausula BETWEEN en SQL
//          $criteria->condition = "genero = 'H'"; //esto es una clausula WHERE en SQL
//          $criteria->addCondition("estado = 1"); //esto es una clausula WHERE en SQL

        
        //----JOIN
//        $criteria->select = "*";
//        $criteria->select = "t.id, t.identificacion, t.email, t.nombre, c.nombre";
//        $criteria->join = "INNER JOIN ciudad c ON c.id = t.ciudad_id";
//        $criteria->limit = "10";
        
        //----JOIN (recomienda utilizar mejor este)
//        $criteria->with = array('ciudad');
        $criteria->with = array(
                                'ciudad' => array(
                                    'condition' => 'estado = 1',
                                    'on' => 'estado = 1',
                                    'joinType' => 'INNER JOIN',
                                ), 
                                'experiencias'
                            );
        
/*
        $criteria->compare('id', $this->id);
        $criteria->compare('ciudad_id', $this->ciudad_id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('identificacion', $this->identificacion);
        $criteria->compare('genero', $this->genero, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
 */      
        //buscar las filas que cumpla con la condicidion
//        $model = new Usuarios;
//        $usuariosCrit = new CActiveDataProvider($model, array(
//            'criteria' => $criteria,
//        ));
        $usuariosCrit = Usuarios::model()->findAll($criteria);
        
        //buscar la primera fila donde la clave primaria sea igual al parametro
//        $usuariosCrit = Usuarios::model()->findAllByPk(array(2,3));
        
        //buscar la primera fila que cumpla con los parametros de $atributes, siempre va traer un registro
//        $usuariosCrit = Usuarios::model()->findAllByAttributes(array('estado'=>'1', 'genero'=>'H'));
        
        //buscar la primera fila que arroje el sql ingresado, siempre va traer un registro
//        $sql = "SELECT * FROM usuarios WHERE genero = 'M' ";
//        $usuariosCrit = Usuarios::model()->findAllBySql($sql);
        
        //--------------SQL Nativo----------------------
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $sqlUsuarios = yii::app()->db->createCommand($sql)->queryAll();
        
        $sqlUsuario = yii::app()->db->createCommand($sql)->queryRow();

        $this->render('index', 
                array(
                    'usuario' => $usuario,
                    'usuarios' => $usuarios, 
                    'usuariosCrit' => $usuariosCrit, 
                    'sqlUsuarios' => $sqlUsuarios, 
                    'sqlUsuario' => $sqlUsuario, 
                ));
    }

}
