<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property integer $id
 * @property string $nombre
 * @property double $dimension
 * @property string $estado
 * @property string $fuente_agua
 * @property integer $id_propietario
 *
 * @property Grupos[] $grupos
 * @property Trabajo[] $trabajos
 * @property Propietario $idPropietario
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_propietario'], 'required'],
            [['dimension'], 'number'],
            [['id_propietario'], 'integer'],
            [['nombre', 'estado', 'fuente_agua'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'dimension' => Yii::t('app', 'Dimension'),
            'estado' => Yii::t('app', 'Estado'),
            'fuente_agua' => Yii::t('app', 'Fuente Agua'),
            'id_propietario' => Yii::t('app', 'Id Propietario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id_ubicacion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajos()
    {
        return $this->hasMany(Trabajo::className(), ['id_ubicacion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropietario()
    {
        return $this->hasOne(Propietario::className(), ['id' => 'id_propietario']);
    }
}
