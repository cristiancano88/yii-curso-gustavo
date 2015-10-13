<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Curso con Gustavo Salgado',
    'language' => 'es',
    'sourceLanguage' => 'en',
    'charset' => 'utf-8',
    //'defaultController'=>'controlador/admin', // Vista por defecto 
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            /*
             * Esta linea lo que hace es utilizar la plantilla que cree para los
             * modelos en vez de la que utiliza yii por defecto.
             * La explicacion de esto esta en el video 
             * "18 YII Framework en Español PHP PERSONALIZAR GENERADOR DE CODIGO PARTE 1"
             */
            'generatorPaths' => array('application.modules.gii')
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        
        //la siguiente linea es para que reconosca la mensajes de error pero no 
        //el que viene por defecto en yii, sino los que estan en la carpeta protected
        //estas lines fueron del video "16 YII Framework en Español PHP TRADUCCION APLICACIÓN"
        'coreMessages' => array(
            'basePath' => 'protected/messages'
        ),
        
        ##la siguiente linea ejecuta la clase que se creo para enviar un mensaje en caso de un error
//        'messages' => array(
//            'onMissingTranslation' => array('GMensajes', 'getNecesitoTraduccion')
//        ),
        
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),

                // uncomment the following to show log messages on web pages
                array(
                'class'=>'CWebLogRoute',
                ),
             
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
