<?php

namespace frontend\modules\ucitelj\models;

use Yii;

/** 
 * This is the model class for table "ocena". 
 * 
 * @property int $id_ocena
 * @property string $vrednost_ocena
 * @property int $zakljucena_ocena
 * @property int $id_ucenik
 * @property int $id_predmet
 * @property int $id_odeljenje
 * 
 * @property Ucenik $ucenik
 * @property Odeljenje $odeljenje
 * @property Predmet $predmet
 */ 
class Ocena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ocena';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vrednost_ocena'], 'string'],
            [['zakljucena_ocena', 'id_ucenik', 'id_predmet', 'id_odeljenje'], 'integer'],
            [['id_ucenik'], 'exist', 'skipOnError' => true, 'targetClass' => Ucenik::className(), 'targetAttribute' => ['id_ucenik' => 'id_ucenik']],
            [['id_odeljenje'], 'exist', 'skipOnError' => true, 'targetClass' => Odeljenje::className(), 'targetAttribute' => ['id_odeljenje' => 'id_odeljenje']],
            [['id_predmet'], 'exist', 'skipOnError' => true, 'targetClass' => Predmet::className(), 'targetAttribute' => ['id_predmet' => 'id_predmet']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ocena' => 'Id Ocena',
            'vrednost_ocena' => 'Vrednost Ocena',
            'zakljucena_ocena' => 'Zakljucena Ocena',
            'id_ucenik' => 'Id Ucenik',
            'id_predmet' => 'Id Predmet',
            'id_odeljenje' => 'Id Odeljenje',
        ];
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
    public function getOdeljenje()
    {
        return $this->hasOne(Odeljenje::className(), ['id_odeljenje' => 'id_odeljenje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPredmet()
    {
        return $this->hasOne(Predmet::className(), ['id_predmet' => 'id_predmet']);
    }
}
