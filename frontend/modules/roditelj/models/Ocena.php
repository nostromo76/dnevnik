<?php

namespace frontend\modules\roditelj\models;

use Yii;

/**
 * This is the model class for table "ocena".
 *
 * @property int $id_ocena
 * @property int $vrednost_ocena
 * @property int $zakljucena_ocena
 * @property int $id_ucenik
 * @property int $id_predmet
 *
 * @property Dnevnik[] $dnevniks
 * @property Ucenik $ucenik
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
            [['vrednost_ocena', 'zakljucena_ocena', 'id_ucenik', 'id_predmet'], 'integer'],
            [['id_ucenik'], 'exist', 'skipOnError' => true, 'targetClass' => Ucenik::className(), 'targetAttribute' => ['id_ucenik' => 'id_ucenik']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDnevniks()
    {
        return $this->hasMany(Dnevnik::className(), ['id_ocena' => 'id_ocena']);
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
    public function getPredmet()
    {
        return $this->hasOne(Predmet::className(), ['id_predmet' => 'id_predmet']);
    }
}
