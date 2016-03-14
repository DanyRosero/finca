<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equinos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $color
 * @property string $sexo
 * @property string $tipo
 * @property string $nacimiento
 * @property integer $id_grupo
 *
 * @property Grupos $idGrupo
 */
class Equinos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equinos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexo', 'tipo', 'nacimiento', 'id_grupo'], 'required'],
            [['nacimiento'], 'safe'],
            [['id_grupo'], 'integer'],
            [['nombre', 'color', 'tipo'], 'string', 'max' => 30],
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
            'nombre' => Yii::t('app', 'Nombre'),
            'color' => Yii::t('app', 'Color'),
            'sexo' => Yii::t('app', 'Sexo'),
            'tipo' => Yii::t('app', 'Tipo'),
            'nacimiento' => Yii::t('app', 'Nacimiento'),
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
}
