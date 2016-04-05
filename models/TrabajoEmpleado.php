<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajo_empleado".
 *
 * @property integer $id_trabajo
 * @property integer $ci_empleado
 * @property double $pago
 */
class TrabajoEmpleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trabajo_empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trabajo', 'ci_empleado', 'pago'], 'required'],
            [['id_trabajo', 'ci_empleado'], 'integer'],
            //[['pago'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_trabajo' => Yii::t('app', 'Id Trabajo'),
            'id_empleado' => Yii::t('app', 'Ci Empleado'),
            'pago' => Yii::t('app', 'Pago'),
        ];
    }
}
