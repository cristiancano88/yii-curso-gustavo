<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property integer $ciudad_id
 * @property string $nombre
 * @property string $email
 * @property integer $estado
 * @property integer $identificacion
 * @property string $genero
 *
 * The followings are the available model relations:
 * @property Estudios[] $estudioses
 * @property Experiencia[] $experiencias
 * @property Folio[] $folios
 * @property Ciudad $ciudad
 */
class Usuarios extends CActiveRecord {

    public static $generos = array('' => '', 'H' => 'Hombre', 'M' => 'Mujer');

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ciudad_id, estado, identificacion', 'numerical', 'integerOnly' => true),
            array('nombre, email', 'length', 'max' => 100),
            array('genero', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ciudad_id, nombre, email, estado, identificacion, genero', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //codigo generado por crud
//			'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
//			'estudioses' => array(self::HAS_MANY, 'Estudios', 'usuario_id'),
//			'experiencias' => array(self::HAS_MANY, 'Experiencia', 'usuario_id'),
//			'folios' => array(self::HAS_MANY, 'Folio', 'usuario_id'),
            //codigo del curso
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'experiencias' => array(self::HAS_MANY, 'Experiencia', 'usuario_id'),
            'experienciaCount' => array(self::STAT, 'Experiencia', 'usuario_id', 'select' => 'SUM(t.usuario_id)'),
//                        'experienciaCount'=>array(self::STAT,'Experiencia','usuario_id','condition'=>"t.empresa = 'empresa1'"),
            'folio' => array(self::HAS_ONE, 'Folio', 'usuario_id'),
            'vacante' => array(self::MANY_MANY, 'Vacantes', 'vacantes_usuarios(vacantes_id,usuarios_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ciudad_id' => 'Ciudad',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'estado' => 'Estado',
            'identificacion' => 'Identificacion',
            'genero' => 'Genero',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

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
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuarios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getGenero($key = null) {
        if ($key !== null)
            return self::$generos[$key];
        return self::$generos;
    }

    public function nombre_estado() {
        return $this->estado == 1 ? "Activo" : "Inactivo";
    }

    public static function getListCiudad() {
        return CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre');
    }

}
