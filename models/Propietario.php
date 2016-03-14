<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $telefono
 * @property string $celular
 * @property string $residencia
 *
 * @property Bovinos[] $bovinos
 * @property Ubicacion[] $ubicacions
 * @property Ventaganado[] $ventaganados
 */
class Propietario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propietario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'celular', 'residencia'], 'required'],
            [['nombre', 'residencia'], 'string', 'max' => 30],
            [['telefono', 'celular'], 'string', 'max' => 10]
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
            'telefono' => Yii::t('app', 'Telefono'),
            'celular' => Yii::t('app', 'Celular'),
            'residencia' => Yii::t('app', 'Residencia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['propietario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacions()
    {
        return $this->hasMany(Ubicacion::className(), ['id_propietario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaganados()
    {
        return $this->hasMany(Ventaganado::className(), ['id_propietario' => 'id']);
    }
}
