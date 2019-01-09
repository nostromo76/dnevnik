<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "odeljenje".
 *
 * @property int $id_odeljenje
 * @property string $naziv
 *
 * @property Dnevnik[] $dnevniks
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
            [['naziv'], 'string', 'max' => 45],
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
