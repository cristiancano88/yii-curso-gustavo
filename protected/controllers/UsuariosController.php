<?php

//class UsuariosController extends GSeguroController
class UsuariosController extends GSeguroController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    //filtyro creados con el curso
    public function filterMyFiltro($filterChain) //esta clase se creo en "\protected\extensions\filtros\MiFiltro.php"
      {
      $filterChain->run(); // para que siga otro filtro
      $this->getId(); //nombre del controlador
    }

      //Esta funcion es de YII, es muy parecida a la forma de como se creo el metodo action de "estado", pero para filtros
    public function filters()
    {
      return array(
      'MyFiltro + edit, create', //MyFiltro: filterMyFiltro(creada arriba)
      array(
      'ext.filtros.MiFiltro - edit, create',
      'parametro1'=>'valordemiparametro',
      )
      );
    }

    //codigo por defecto de yii
//    public function filters() {
//        return array(
//            'accessControl', // perform access control for CRUD operations
//            'postOnly + delete', // we only allow deletion via POST request
//        );
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /*
      //LAS REGLAS LAS ESTA HEREDANDO DE LA CLASE CONTROLADOR GLOBAL QUE SE CREO EN ( ../prtected/components/GSeguroController.php ), en el video "44 Yii Framework en Espanol PHP ACCIONES FILTROS Y CONTROLADOR PARTE 2"
      public function accessRules()
      {
      return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
      'actions'=>array('estado'),
      'users'=>array('*'),
      //				'controllers'=>array('usuarios', 'experiencia'), //se deniegan a permiten accesos a controladores

      'users'=>'?',
      'ips'=>'111.222.333', //ip de servidor
      'verbs'=>array('GET','POST'), //denegar el acceso a este controlador por estos parametros
      'roles'=>array('administrators','rol2'),
      'expression'=>'$user->id == 2',
      ),
      array('allow',  // allow all users to perform 'index' and 'view' actions
      'actions'=>array('index','view'),
      'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions'=>array('create','update'),
      'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions'=>array('admin','delete'),
      'users'=>array('admin'),
      ),
      array('deny',  // deny all users
      'users'=>array('*'),
      ),
      );
      } */

    /*     * Video "43 Yii Framework en Espanol PHP ACCIONES FILTROS Y CONTROLADOR PARTE 1"
     * Otra forma de crear controladores
     * 
     */
    public function actions() {
        return array(
            'estado' => array(//el nombre de la accion
                'class' => 'ext.acciones.EstadoAction', //clase que va ha heredar (prottected/extenciones/acciones/EstadoAction.php)
                'model' => 'Usuarios',
                'redirect' => 'index',
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuarios();

        //-----------------------------------
        //Escenario es para trabajar con la reglas de validacion en el modelo
//        $model=new Usuarios('firme');
//        $model=new Usuarios('estupido');
//        $model->scenario = 'firme';
//        $model->scenario = 'estupido';
//        $model->setScenario('firme');
//        $model->setScenario('estupido');
//        if( $model->getScenario() === 'firme' ) {
//            echo 'mi logica basica para Firme';
//        } 
//        if( $model->scenario() === 'firme' ) {
//            echo 'mi logica basica para Firme';
//        }
        //----------------------------------
        //Guardar registro sin necesidad de un formulario
        /*
          $model=Usuarios::model()->findByPk(3);
          $model->nombre='Otra forma de EDITAR nombres';
          $model->ciudad_id=2;
          $model->identificacion=99999999;
          $model->email='emain@gmail.co';
          $model->estado=1;
          $model->genero='H';
          $model->save();

         */

        //----------------------------------
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }

         */

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            /*
              $model->attributes=array(
              'nombre'=>'Otra forma de ingresar nombres',
              'ciudad_id'=>2,
              'identificacion'=>999,
              'email'=>'emain@gmail.com',
              'estado'=>1,
              'genero'=>'H',
              );
              if($model->validate())
              echo 'Todo se valido bien';
              else
              echo 'Epaa algun dato no esta bien';
             */


            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            $model->password = $model->hashPassword($_POST['Usuarios']['password'], $session = $model->generateSalt());
            $model->session = $session;

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
//    public function actionIndex($id, $title) {
    public function actionIndex() {
        //esta linea es para probar la segunda bd (yii-curso-gustavo2) -- 32 Yii Framework en Espanol PHP USAR VARIAS CONEXIONES BASES DE DATOS
        #$tareas=Tasks::model()->findAll();
        #echo '<pre>';
        #var_dump($tareas);
        #exit();
        //----------
        //
        //codigo colocado en el video (49 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 3)
//        $auth = Yii::app()->authManager;
//        $auth->createOperation('editar_usuarios', 'Esta operacion es para editar.');
//        $tash = $auth->createTask('tarea_edicion', 'Esta tarea es para editar.');
//        $tash->addChild('editar_usuarios');
//        $role = $auth->createRole('rol_edicion', 'Esta tarea es para editar.');
//        $role->addChild('tarea_edicion');
        
        /*
         * breve descripcion de lo que se hizo arriba
        rol  rol_edicion
                - tarea tarea_edicion
                        - operacion editar_usuarios
        */

//        $auth->assign('rol_edicion',Yii::app()->user->id);

//        if(Yii::app()->authManager->checkAccess('rol_edicion',Yii::app()->user->id))
//        if(Yii::app()->authManager->checkAccess('editar_usuarios',Yii::app()->user->id))
//        {
//            echo 'SIIIIII!!!!! je je je ';
//        } else
//            echo 'NOOOOOOOOOO!!!  ha ha ha ha ha ha';

        //Fin codigo colocado en el video (49 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 3)
        //----------------------------
        
        //codigo del video ( 57 Yii Framework en Español PHP LINKS, URL Y HELPER CHTML )
        echo '<br>';
        echo 'id GET: '. $_GET['id'] .'<br>';
        echo 'title GET: '. $_GET['title'];

        //fin codigo del video ( 57 Yii Framework en Español PHP LINKS, URL Y HELPER CHTML )
        //-------------------------
        
        
        $dataProvider = new CActiveDataProvider('Usuarios');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        ////video 60
        if(Yii::app()->request->isAjaxRequest)
        {
            echo CJSON::encode($_GET);
            echo CJSON::encode($_POST);
            Yii::app()->end();
        }
        
        
        echo "<pre>";
        print_r($_POST);
        print_r($_GET);
        echo "</pre>";
        //fin video 60
        
        $model = new Usuarios('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuarios']))
            $model->attributes = $_GET['Usuarios'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuarios the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuarios::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuarios $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuarios-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
