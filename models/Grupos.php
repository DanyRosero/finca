<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_ubicacion
 *
 * @property Bovinos[] $bovinos
 * @property Equinos[] $equinos
 * @property Ubicacion $idUbicacion
 */
class Grupos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'id_ubicacion'], 'required'],
            [['id_ubicacion'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
            [['descripcion'], 'string', 'max' => 50]
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
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_ubicacion' => Yii::t('app', 'Id Ubicacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['id_grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquinos()
    {
        return $this->hasMany(Equinos::className(), ['id_grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['id' => 'id_ubicacion']);
    }
}
