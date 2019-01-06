<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dnevnik".
 *
 * @property int $id_dnevnik
 * @property int $id_ucenik
 * @property int $id_ucitelj
 * @property int $id_roditelj
 * @property int $id_odeljenje
 * @property int $id_ocena
 *
 * @property Ocena $ocena
 * @property Odeljenje $odeljenje
 * @property Roditelj $roditelj
 * @property Ucenik $ucenik
 * @property Ucitelj $ucitelj
 */
class Dnevnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dnevnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ucenik', 'id_ucitelj', 'id_roditelj', 'id_odeljenje', 'id_ocena'], 'required'],
            [['id_ucenik', 'id_ucitelj', 'id_roditelj', 'id_odeljenje', 'id_ocena'], 'integer'],
            [['id_ocena'], 'exist', 'skipOnError' => true, 'targetClass' => Ocena::className(), 'targetAttribute' => ['id_ocena' => 'id_ocena']],
            [['id_odeljenje'], 'exist', 'skipOnError' => true, 'targetClass' => Odeljenje::className(), 'targetAttribute' => ['id_odeljenje' => 'id_odeljenje']],
            [['id_roditelj'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['id_roditelj' => 'id_roditelj']],
            [['id_ucenik'], 'exist', 'skipOnError' => true, 'targetClass' => Ucenik::className(), 'targetAttribute' => ['id_ucenik' => 'id_ucenik']],
            [['id_ucitelj'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['id_ucitelj' => 'id_ucitelj']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dnevnik' => 'Id Dnevnik',
            'id_ucenik' => 'Id Ucenik',
            'id_ucitelj' => 'Id Ucitelj',
            'id_roditelj' => 'Id Roditelj',
            'id_odeljenje' => 'Id Odeljenje',
            'id_ocena' => 'Id Ocena',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcena()
    {
        return $this->hasOne(Ocena::className(), ['id_ocena' => 'id_ocena']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdeljenje()
    {
        return $this->hasOne(Odeljenje::className(), ['id_odeljenje' => 'id_odeljenje']);
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
    public function getUcenik()
    {
        return $this->hasOne(Ucenik::className(), ['id_ucenik' => 'id_ucenik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'id_ucitelj']);
    }
}
