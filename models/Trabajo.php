<?php

namespace app\models;

use Yii;
use app\models\Empleado;
use app\models\TrabajoEmpleado;

/**
 * This is the model class for table "trabajo".
 *
 * @property integer $id
 * @property string $tipo
 * @property integer $duracion_dias
 * @property double $costo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_ubicacion
 *
 * @property Ubicacion $idUbicacion
 */
class Trabajo extends \yii\db\ActiveRecord
{
    public $empleado;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'duracion_dias', 'costo', 'fecha_inicio', 'fecha_fin', 'id_ubicacion'], 'required'],
            [['duracion_dias', 'id_ubicacion'], 'integer'],
            [['costo'], 'number'],
            [['duracion_dias'], 'validarDias'],
            [['costo'], 'validarCosto'],
            [['fecha_inicio', 'fecha_fin', 'empleado'], 'safe'],
            [['tipo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo' => Yii::t('app', 'Tipo'),
            'duracion_dias' => Yii::t('app', 'Duracion - Dias'),
            'costo' => Yii::t('app', 'Costo'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'id_ubicacion' => Yii::t('app', 'Ubicacion'),
            'empleado' => \Yii::t('app', 'Empleados'),
        ];
    }

    public function afterSave($insert, $changedAttributes) {   
        
        /*aqui en el isset se esta esperando q $_POST['Construccion']['material'] venga
         *con materiales, en el caso de q no venga va al else          */
        if (isset($_POST['Trabajo']['empleado'])) {
            \Yii::$app->db->createCommand()->delete('trabajo_empleado', 'id_trabajo = ' . (int) $this->id)->execute();

            $emp = $_POST['Trabajo']['empleado'];
            //
            foreach ($emp as $id) {
                $ro = new TrabajoEmpleado();
                $ro->id_trabajo = $this->id;
                $ro->ci_empleado = $id; 
                $ro->pago = 0; // aqui es 0 xq cuando seleccionas los amteriales no has ingresado precio
                $ro->save();
            }
        } else {
            /* aqui en el isset se comprueba de que la accion del formulario del modal, osea el guardar se haya presionado*/
            if (isset($_POST['guardar'])) {
                \Yii::$app->db->createCommand()->delete('trabajo_empleado', 'id_trabajo = ' . (int) $this->id.' and ci_empleado = '.(int)$_POST['ci'])->execute();
                $ro = new TrabajoEmpleado();
                $ro->id_trabajo = $this->id;
                $ro->ci_empleado = $_POST['ci']; // este ci se recibe del modal
                $ro->pago = $_POST['pago'];// este pago se reciba del modal
                $ro->save();
            }
        }
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['id' => 'id_ubicacion']);
    }
    
    // Otras funciones
    public function getTrabajoEmpleado() {
        return $this->hasMany(TrabajoEmpleado::className(), ['id_trabajo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiEmpleado() {
        return $this->hasMany(Empleado::className(), ['ci' => 'ci_empleado'])->viaTable('trabajo_empleado', ['id_trabajo' => 'id']);
    }

    public function getEmpleadoList() {
        return $this->getCiEmpleado()->asArray();
    }
    
    public function validarCosto($cst) {
        if (!$this->hasErrors()) {
            if ((float)$this->costo < 0) {
                $this->addError($cst, 'El costo no puede ser negativo');
            }
        }
    }
    
    public function validarDias($di) {
        if (!$this->hasErrors()) {
            if ((float)$this->duracion_dias <= 0) {
                $this->addError($di, 'Ingrese dias laborados');
            }
        }
    }
    
}
