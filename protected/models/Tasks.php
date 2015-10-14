<?php

/**
 * This is the model class for table "categorias".
 *
 * The followings are the available columns in table 'categorias':
 * @property integer $id
 * @property string $nombre
 */
class Tasks extends GActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Categorias the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDbConnection() {
        return self::getDatos1DbConnection();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'yii-curso-gustavo2.tasks';
    }

    /**
     * @return string este pedazo lo puso gustavo
     */
    public function primaryKey() {
        return 'id';
    }

}
