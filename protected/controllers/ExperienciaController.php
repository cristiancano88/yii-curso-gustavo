<?php

class ExperienciaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
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
        $model = new Experiencia;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Experiencia'])) {
            $model->attributes = $_POST['Experiencia'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        // $this->performAjaxValidation($model);

        if (isset($_POST['Experiencia'])) {
            $model->attributes = $_POST['Experiencia'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
    public function actionIndex() {
        //codigo del video (51 Yii Framework en Español PHP USAR CODIGO DE TERCEROS)
        #Yii::import("application.*");
        #Yii::import("application.Gustavo");
        #Yii::import("webroot.*");
        #Yii::import("webroot.Gustavo");
        #Yii::import("ext.gustavo.Gustavo");
        #Yii::import("system.gustavo.Gustavo");//"system" hace referencia a archivos que estan dentro de la carpeta de "yii"
        #Yii::import("zii.gustavo.Gustavo");//zii: C:\xampp\htdocs\yii\zii
        #Yii::import("gus.Gustavo.inc"); //para utilizar la ruta "gus" primero se definio en el main.php

        /*
         * la siguiente linea se utiliza es cuando un archivo de clase no se llama igual que la clase,
         * por ejemplo el archivo se llama "pepe.php" y la clase se llama "class pepito" 
         */
        //include(Yii::getPathOfAlias("gus.libreria")."\Gustavo.php");
        //$gustavo = new Gustavo();
        //Fin codigo del video (51 Yii Framework en Español PHP USAR CODIGO DE TERCEROS)
        
        // codigo del video ( 52 Yii Framework en Español PHP USAR PHPMAILER ENVIO DE EMAIL )
        $dataProvider = new CActiveDataProvider('Experiencia');
        if (isset($_GET['mail'])) {
            $this->layout = "//layouts/main_email"; //setea el layout
            
//            $text = $this->renderPartiar('email', array(
            $text = $this->render('email', array(
                'dataProvider' => $dataProvider,
                    ), true);

            Yii::import("ext.Mailer.*");
            $mail = new PHPMailer();
            $mail->SetFrom("cristiancano888@gmail.com", "Cristian");
            $mail->Subject = "Mi asunto";
            $mail->MsgHTML($text);
            $mail->AddAddress("cristiancano888@gmail.com", "Gustavo");
            $mail->AddCC("cristiancano88@hotmail.com", "Cristian");
            $mail->AddBCC("cristiancano88@hotmail.com", "Cristian");
            $mail->send();
        }

        $this->layout = "//layouts/column2";
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));

        // fin codigo del video ( 52 Yii Framework en Español PHP USAR PHPMAILER ENVIO DE EMAIL )

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Experiencia('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Experiencia']))
            $model->attributes = $_GET['Experiencia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Experiencia the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Experiencia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Experiencia $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'experiencia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
