<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nombres
 * @property string $foto
 * @property string $telefono
 * @property string $celular
 * @property int $created_at
 * @property int $updated_at
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['nombres'], 'string', 'max' => 250],
            [['foto', 'telefono', 'celular'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nombres' => 'Nombres',
            'foto' => 'Foto',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
