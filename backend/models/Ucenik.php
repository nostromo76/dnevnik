<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ucenik".
 *
 * @property int $id_ucenik
 * @property string $ime
 * @property string $prezime
 * @property int $id_odeljenje
 * @property int $id_roditelj
 *
 * @property Dnevnik[] $dnevniks
 * @property Ocena[] $ocenas
 * @property Roditelj[] $roditeljs
 * @property Roditelj $roditelj
 * @property Odeljenje $odeljenje
 */
class Ucenik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ucenik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ime', 'prezime', 'id_odeljenje'], 'required'],
            [['id_odeljenje', 'id_roditelj'], 'integer'],
            [['ime', 'prezime'], 'string', 'max' => 45],
            [['id_roditelj'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['id_roditelj' => 'id_roditelj']],
            [['id_odeljenje'], 'exist', 'skipOnError' => true, 'targetClass' => Odeljenje::className(), 'targetAttribute' => ['id_odeljenje' => 'id_odeljenje']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ucenik' => 'Id Ucenik',
            'ime' => 'Ime',
            'prezime' => 'Prezime',
            'id_odeljenje' => 'Id Odeljenje',
            'id_roditelj' => 'Id Roditelj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDnevniks()
    {
        return $this->hasMany(Dnevnik::className(), ['id_ucenik' => 'id_ucenik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenas()
    {
        return $this->hasMany(Ocena::className(), ['id_ucenik' => 'id_ucenik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoditeljs()
    {
        return $this->hasMany(Roditelj::className(), ['id_ucenik' => 'id_ucenik']);
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
    public function getOdeljenje()
    {
        return $this->hasOne(Odeljenje::className(), ['id_odeljenje' => 'id_odeljenje']);
    }
}
