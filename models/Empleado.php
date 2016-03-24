<?php

namespace app\models;

use Yii;

date_default_timezone_set('America/Guayaquil');
/**
 * This is the model class for table "empleado".
 *
 * @property string $ci
 * @property string $nombre
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property string $fecha_contrato
 * @property double $salario
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci', 'nombre', 'apellidos', 'fecha_nacimiento', 'fecha_contrato', 'salario'], 'required', 'message' => 'Campo requerido'],
            [['ci'], 'valCedula'],
            [['nombre'], 'valNombre'],
            [['apellidos'], 'valApe'],
            [['fecha_nacimiento', 'fecha_contrato'], 'safe'],
            [['fecha_nacimiento'], 'validarNacimiento'],
            [['fecha_contrato'], 'validarIngreso'],
            [['salario'], 'number', 'message' => 'Debe ingresar un valor numerico'],
            [['salario'], 'validarSalario'],
            [['ci'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 30],
            [['apellidos'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ci' => Yii::t('app', 'Documento de Identidad'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'fecha_contrato' => Yii::t('app', 'Fecha Contrato'),
            'salario' => Yii::t('app', 'Salario'),
        ];
    }
    
    public function validarNacimiento($aux)
    {
        if (!$this->hasErrors()) {
            $date = $this->fecha_nacimiento;
            if ($date > '1997-12-31' || $date < '1940-12-31') {
                $this->addError($aux, 'Ingrese fecha correcta.');
            }
        }
    }
    
    public function valNombre($nam){
        if (!$this->hasErrors()) {
            if (!ereg("^[a-zA-Z]{3,30}$", $this->nombre)){
                $this->addError($nam, 'Ingrese nombre valido');
            }
        }
    }
    
    public function valApe($ape){
        if (!$this->hasErrors()) {
            if (!ereg("^[a-zA-Z ]{3,30}$", $this->apellidos)){
                $this->addError($ape, 'Ingrese apellidos validos');
            }
        }
    }
    
    public function valCedula($ced){
        if (!$this->hasErrors()) {
            if (!ereg("^[0-9]{10,10}$", $this->ci)){
                $this->addError($ced, 'Ingrese una cedula correcta');
            }
        }
    }

    public function validarSalario($sal) {
        if (!$this->hasErrors()) {
            if ((float)$this->salario < 0) {
                $this->addError($sal, 'No se permiten valores negativos');
            }
        }
    }

    public function validarIngreso($aux) {
        if (!$this->hasErrors()) {
            $date = $this->fecha_contrato;
            if ($date > date('Y-m-d') || $date < $this->fecha_nacimiento+18) {
                $this->addError($aux, 'Selecicone una fecha correcta.');
            }
        }
    }
}
