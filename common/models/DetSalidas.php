<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "det_salidas".
 *
 * @property int $id
 * @property int $cab_id
 * @property int $coditem
 * @property string $descripcion
 * @property string $bodega
 * @property string $cantidad
 * @property string $unidad
 * @property string $piso
 * @property string $observacion
 * @property string $cantidadfiscaliza
 * @property string $diferencia
 * @property string $comentario
 * @property int $estado
 *
 * @property CabSalidas $cab
 */
class DetSalidas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'det_salidas';
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
            //[['cab_id', 'coditem', 'descripcion', 'bodega', 'cantidad', 'unidad', 'piso', 'observacion', 'comentario'], 'required'],
            [['cab_id', 'coditem', 'estado'], 'default', 'value' => null],
            [['cab_id', 'coditem', 'estado'], 'integer'],
            [['cantidad', 'cantidadfiscaliza', 'diferencia'], 'number'],
            [['descripcion', 'observacion', 'comentario'], 'string', 'max' => 255],
            [['bodega'], 'string', 'max' => 10],
            [['unidad'], 'string', 'max' => 5],
            [['piso'], 'string', 'max' => 3],
            [['cab_id'], 'exist', 'skipOnError' => true, 'targetClass' => CabSalidas::className(), 'targetAttribute' => ['cab_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cab_id' => 'Cab ID',
            'coditem' => 'Coditem',
            'descripcion' => 'Descripcion',
            'bodega' => 'Bodega',
            'cantidad' => 'Cantidad',
            'unidad' => 'Unidad',
            'piso' => 'Piso',
            'observacion' => 'Observacion',
            'cantidadfiscaliza' => 'Cantidadfiscaliza',
            'diferencia' => 'Diferencia',
            'comentario' => 'Comentario',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCab()
    {
        return $this->hasOne(CabSalidas::className(), ['id' => 'cab_id']);
    }
}
