<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "poruke".
 *
 * @property int $id_poruke
 * @property string $poruka
 * @property string $vreme
 * @property int $id_roditelj
 * @property int $id_ucitelj
 *
 * @property Roditelj $roditelj
 * @property Ucitelj $ucitelj
 */
class Poruke extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poruke';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poruka', 'id_roditelj', 'id_ucitelj'], 'required'],
            [['poruka'], 'string'],
            [['vreme'], 'safe'],
            [['id_roditelj', 'id_ucitelj'], 'integer'],
            [['id_roditelj'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['id_roditelj' => 'id_roditelj']],
            [['id_ucitelj'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['id_ucitelj' => 'id_ucitelj']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_poruke' => 'Id Poruke',
            'poruka' => 'Poruka',
            'vreme' => 'Vreme',
            'id_roditelj' => 'Id Roditelj',
            'id_ucitelj' => 'Id Ucitelj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoditelj()
    {
        return $this->hasOne(Roditelj::className(), ['id_roditelj' => 'id_roditelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'id_ucitelj']);
    }
}
