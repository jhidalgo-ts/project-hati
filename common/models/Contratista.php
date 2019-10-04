<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "contratista".
 *
 * @property int $id
 * @property int $numid
 * @property string $razonsocial
 * @property string $replegal
 * @property int $formapago
 * @property int $numcuenta
 * @property int $pagquincenal
 * @property int $estado
 * @property int $created_at
 * @property int $updated_at
 */
class Contratista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /*
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'contratista';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbRrhh');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numid', 'razonsocial', 'replegal', 'formapago', 'estado', 'created_at', 'updated_at'], 'required'],
            [['numid', 'formapago', 'numcuenta', 'pagquincenal', 'estado', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['numid', 'formapago', 'numcuenta', 'pagquincenal', 'estado', 'created_at', 'updated_at'], 'integer'],
            [['razonsocial', 'replegal'], 'string', 'max' => 150],
            [['numid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numid' => 'Ruc',
            'razonsocial' => 'Razon Social',
            'replegal' => 'Rep. Legal',
            'formapago' => 'Forma Pago',
            'numcuenta' => 'Cuenta',
            'pagquincenal' => 'Quincena',
            'estado' => 'Estado',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
