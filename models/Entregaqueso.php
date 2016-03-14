<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entregaqueso".
 *
 * @property integer $id
 * @property double $peso_finca
 * @property double $peso_entrega
 * @property double $precio_libra
 * @property string $fecha_entrega
 * @property integer $id_cliente
 *
 * @property Cliente $idCliente
 */
class Entregaqueso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregaqueso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso_finca', 'peso_entrega', 'precio_libra', 'fecha_entrega', 'id_cliente'], 'required'],
            [['peso_finca', 'peso_entrega', 'precio_libra'], 'number'],
            [['fecha_entrega'], 'safe'],
            [['id_cliente'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'peso_finca' => Yii::t('app', 'Peso Finca'),
            'peso_entrega' => Yii::t('app', 'Peso Entrega'),
            'precio_libra' => Yii::t('app', 'Precio Libra'),
            'fecha_entrega' => Yii::t('app', 'Fecha Entrega'),
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
}
