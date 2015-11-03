<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        //codifgo que viene por defecto yii
//        $users = array(
//            // username => password
//            'demo' => 'demo',
//            'admin' => 'admin',
//        );
//        if (!isset($users[$this->username]))
//            $this->errorCode = self::ERROR_USERNAME_INVALID;
//        elseif ($users[$this->username] !== $this->password)
//            $this->errorCode = self::ERROR_PASSWORD_INVALID;
//        else
//            $this->errorCode = self::ERROR_NONE;
//        return !$this->errorCode;


        //codigo colocado en el video (48 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 2)
        $user = Usuarios::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            //echo Yii::app()->user->id; // id del usuario logeado
            $this->setState('nombre', $user->nombre);
            $this->setState('identificacion', $user->identificacion);
            //echo Yii::app()->user->getState('nombre'); // nombre del usuario logeado

            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }
    
    /**
     * @return integer the ID of the user record
     */
    //codigo colocado en el video (48 Yii Framework en Espanol PHP AUTENTICACION, AUTORIZACION Y CONTOL DE ACCESO 2)
    public function getId()
    {
            return $this->_id;
    }

}
