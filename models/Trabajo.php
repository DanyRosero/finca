<?php

namespace app\models;

use Yii;

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
            [['fecha_inicio', 'fecha_fin'], 'safe'],
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
            'duracion_dias' => Yii::t('app', 'Duracion Dias'),
            'costo' => Yii::t('app', 'Costo'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'id_ubicacion' => Yii::t('app', 'Id Ubicacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['id' => 'id_ubicacion']);
    }
}
