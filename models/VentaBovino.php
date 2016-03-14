<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta_bovino".
 *
 * @property integer $id_venta
 * @property integer $id_bovino
 * @property integer $precio
 */
class VentaBovino extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta_bovino';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_venta', 'id_bovino', 'precio'], 'required'],
            [['id_venta', 'id_bovino', 'precio'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_venta' => Yii::t('app', 'Id Venta'),
            'id_bovino' => Yii::t('app', 'Id Bovino'),
            'precio' => Yii::t('app', 'Precio'),
        ];
    }
}
