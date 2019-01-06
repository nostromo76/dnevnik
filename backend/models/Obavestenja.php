<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "obavestenja".
 *
 * @property int $id_obavestenja
 * @property string $naziv
 * @property string $opis
 * @property string $vreme
 * @property int $id_ucitelj
 * @property int $id_roditelj
 *
 * @property Roditelj $roditelj
 * @property Ucitelj $ucitelj
 */
class Obavestenja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obavestenja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['naziv', 'opis', 'id_ucitelj', 'id_roditelj'], 'required'],
            [['opis'], 'string'],
            [['vreme'], 'safe'],
            [['id_ucitelj', 'id_roditelj'], 'integer'],
            [['naziv'], 'string', 'max' => 45],
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
            'id_obavestenja' => 'Id Obavestenja',
            'naziv' => 'Naziv',
            'opis' => 'Opis',
            'vreme' => 'Vreme',
            'id_ucitelj' => 'Id Ucitelj',
            'id_roditelj' => 'Id Roditelj',
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
