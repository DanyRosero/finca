<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventaganado".
 *
 * @property integer $id
 * @property string $fecha_venta
 * @property integer $id_propietario
 * @property integer $id_cliente
 *
 * @property Cliente $idCliente
 * @property Propietario $idPropietario
 */
class Ventaganado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ventaganado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_venta', 'id_propietario', 'id_cliente'], 'required'],
            [['fecha_venta'], 'safe'],
            [['id_propietario', 'id_cliente'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_venta' => Yii::t('app', 'Fecha Venta'),
            'id_propietario' => Yii::t('app', 'Id Propietario'),
            'id_cliente' => Yii::t('app', 'Id Cliente'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropietario()
    {
        return $this->hasOne(Propietario::className(), ['id' => 'id_propietario']);
    }
}
