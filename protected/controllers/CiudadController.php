<?php

class CiudadController extends Controller {

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
//			array('deny',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
//				'roles'=>array('rol_edicion'),
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
        $model = new Ciudad;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ciudad'])) {
            $model->attributes = $_POST['Ciudad'];
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

        if (isset($_POST['Ciudad'])) {
            $model->attributes = $_POST['Ciudad'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Todo bien men!! je je.');
                $this->redirect(array('view', 'id' => $model->id));
            }
            Yii::app()->user->setFlash('error', 'Todo mal men NOOOOOOOOOOO!.');
        }

        Yii::app()->user->setFlash('error', 'Todo mal men NOOOOOOOOOOO!.');
        Yii::app()->user->setFlash('success', 'Todo bien eeeeeee.');
        Yii::app()->user->setFlash('notice', 'Ejemplo de noticeeeeeeeeeeeee.');
        Yii::app()->user->setFlash('info', 'Ejemplo de noticeeeeeeeeeeeee.');
        Yii::app()->user->setFlash('alert', 'Ejemplo de noticeeeeeeeeeeeee.');

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
        
        //codigo del video ( 53 Yii Framework en Espanol PHP ARCHIVOS TXT )
//        $texto = '';
//        $model = Usuarios::model()->findAll();
//        foreach ($model as $user) {
//            $texto .= $user->id .', '. $user->nombre .', '. $user->identificacion;
//        }
//        yii::app()->request->sendFile('miarchivo.txt', $texto);
        //fin codigo del video ( 53 Yii Framework en Espanol PHP ARCHIVOS TXT )
        //-------------------------
        //codigo del video ( 54 Yii Framework en Espanol PHP EXPORTAR A EXCEL )
//        $model = Usuarios::model()->findAll();
//        
//        yii::app()->request->sendFile('miarchivo.xls', 
//            $this->renderPartial('excel', array(
//                'model' => $model,
//            ),true)    
//        );
        //fin codigo del video ( 54 Yii Framework en Espanol PHP EXPORTAR A EXCEL )
        //-------------------------
        //codigo del video ( 55 Yii Framework en Espanol PHP EXPORTAR A PDF 1 )
        $dataProvider = new CActiveDataProvider('Ciudad');
        if ( isset($_GET['pdf']) ) {
            
           /*-------mPDF---------*/
            /*
//            $this->layout = "//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();

    //        $mPDF1->WriteHTML('<h1>Hola mundo</h1>');
    //        $mPDF1->WriteHTML('<p>Este es mi primer PDF</p>');
            $mPDF1->WriteHTML($this->renderPartial('index', array(
                'dataProvider' => $dataProvider,
                ), true)
            );

            $mPDF1->Output();
//            $mPDF1->Output('mi pdf.pdf', EYiiPdf::OUTPUT_TO_BROWSER);
//            $mPDF1->Output('mi pdf.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);
//            $mPDF1->Output('mi pdf.pdf', EYiiPdf::OUTPUT_TO_FILE);
//            $mPDF1->Output('mi pdf.pdf', EYiiPdf::OUTPUT_TO_STRING);//esta es para envio de emails
             * 
             */
            
            /*--------HTML2PDF----------*/
            
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($this->renderPartial('index', array(
                'dataProvider' => $dataProvider,
                ), true)
            );

            $html2pdf->Output();
            
        }
         $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        //fin codigo del video ( 55 Yii Framework en Espanol PHP EXPORTAR A PDF 1 )
        //-------------------------
//        $dataProvider = new CActiveDataProvider('Ciudad');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Ciudad('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ciudad']))
            $model->attributes = $_GET['Ciudad'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ciudad the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Ciudad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Ciudad $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ciudad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
