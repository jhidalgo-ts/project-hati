<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "cab_salidas".
 *
 * @property int $id
 * @property int $docnum
 * @property int $salidanum
 * @property string $tiposalida
 * @property string $fechadocumento
 * @property string $solicita
 * @property string $aprueba
 * @property string $retira
 * @property int $estado
 *
 * @property DetSalidas[] $detSalidas
 */
class CabSalidas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cab_salidas';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbSap');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['docnum', 'tiposalida', 'fechadocumento', 'estado'], 'required'],
            [['docnum', 'salidanum', 'estado'], 'default', 'value' => null],
            [['docnum', 'salidanum', 'estado'], 'integer'],
            [['fechadocumento'], 'safe'],
            [['tiposalida'], 'string', 'max' => 5],
            [['solicita', 'aprueba'], 'string', 'max' => 4],
            [['retira'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'docnum' => 'Numero',
            'salidanum' => 'Salida',
            'tiposalida' => 'Tipo',
            'fechadocumento' => 'Fecha',
            'solicita' => 'Solicitante',
            'aprueba' => 'Aprobado',
            'retira' => 'Retira',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetSalidas()
    {
        return $this->hasMany(DetSalidas::className(), ['cab_id' => 'id']);
    }
}
