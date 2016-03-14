<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nombre_apellido
 * @property string $telefono
 * @property string $celular
 * @property string $producto
 *
 * @property Entregaqueso[] $entregaquesos
 * @property Ventaganado[] $ventaganados
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_apellido', 'celular', 'producto'], 'required'],
            [['nombre_apellido'], 'string', 'max' => 40],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['producto'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_apellido' => Yii::t('app', 'Nombre Apellido'),
            'telefono' => Yii::t('app', 'Telefono'),
            'celular' => Yii::t('app', 'Celular'),
            'producto' => Yii::t('app', 'Producto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregaquesos()
    {
        return $this->hasMany(Entregaqueso::className(), ['id_cliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaganados()
    {
        return $this->hasMany(Ventaganado::className(), ['id_cliente' => 'id']);
    }
}
