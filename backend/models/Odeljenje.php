<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "odeljenje".
 *
 * @property int $id_odeljenje
 * @property string $naziv
 * @property int $ucitelj_id
 *
 * @property Obavestenja[] $obavestenjas
 * @property Ucitelj $ucitelj
 * @property Raspored[] $rasporeds
 * @property Ucenik[] $uceniks
 * @property Ucitelj[] $uciteljs
 */
class Odeljenje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'odeljenje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['naziv'], 'required'],
            [['ucitelj_id'], 'integer'],
            [['naziv'], 'string', 'max' => 45],
            [['ucitelj_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['ucitelj_id' => 'id_ucitelj']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_odeljenje' => 'Id Odeljenje',
            'naziv' => 'Naziv',
            'ucitelj_id' => 'Ucitelj ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObavestenjas()
    {
        return $this->hasMany(Obavestenja::className(), ['id_odeljenje' => 'id_odeljenje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'ucitelj_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRasporeds()
    {
        return $this->hasMany(Raspored::className(), ['id_odeljenje' => 'id_odeljenje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUceniks()
    {
        return $this->hasMany(Ucenik::className(), ['id_odeljenje' => 'id_odeljenje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUciteljs()
    {
        return $this->hasMany(Ucitelj::className(), ['id_odeljenje' => 'id_odeljenje']);
    }
}
