<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "odeljenje".
 *
 * @property int $id_odeljenje
 * @property string $naziv
 * @property int $id_ucitelj
 *
 * @property Dnevnik[] $dnevniks
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
            [['naziv', 'id_ucitelj'], 'required'],
            [['id_ucitelj'], 'integer'],
            [['naziv'], 'string', 'max' => 45],
            [['id_ucitelj'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['id_ucitelj' => 'id_ucitelj']],
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
            'id_ucitelj' => 'Id Ucitelj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDnevniks()
    {
        return $this->hasMany(Dnevnik::className(), ['id_odeljenje' => 'id_odeljenje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'id_ucitelj']);
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
