<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bovinos".
 *
 * @property integer $id
 * @property integer $propietario
 * @property string $color
 * @property string $sexo
 * @property string $nacimiento
 * @property string $raza
 * @property string $cachos_detalle
 * @property integer $id_madre
 * @property integer $id_grupo
 *
 * @property Grupos $idGrupo
 * @property Bovinos $idMadre
 * @property Bovinos[] $bovinos
 * @property Propietario $propietario0
 */
class Bovinos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bovinos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propietario', 'color', 'sexo', 'id_grupo'], 'required'],
            [['propietario', 'id_madre', 'id_grupo'], 'integer'],
            [['nacimiento'], 'safe'],
            [['color', 'raza', 'cachos_detalle'], 'string', 'max' => 30],
            [['sexo'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'propietario' => Yii::t('app', 'Propietario'),
            'color' => Yii::t('app', 'Color'),
            'sexo' => Yii::t('app', 'Sexo'),
            'nacimiento' => Yii::t('app', 'Nacimiento'),
            'raza' => Yii::t('app', 'Raza'),
            'cachos_detalle' => Yii::t('app', 'Cachos Detalle'),
            'id_madre' => Yii::t('app', 'Id Madre'),
            'id_grupo' => Yii::t('app', 'Id Grupo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMadre()
    {
        return $this->hasOne(Bovinos::className(), ['id' => 'id_madre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBovinos()
    {
        return $this->hasMany(Bovinos::className(), ['id_madre' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario0()
    {
        return $this->hasOne(Propietario::className(), ['id' => 'propietario']);
    }
}
