<?php

namespace frontend\modules\ucitelj\models;

use Yii;

/**
 * This is the model class for table "obavestenja".
 *
 * @property int $id_obavestenja
 * @property string $naziv
 * @property string $opis
 * @property string $vreme
 * @property int $id_odeljenje
 *
 * @property Odeljenje $odeljenje
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
            [['naziv', 'opis'], 'required'],
            [['opis'], 'string'],
            [['vreme'], 'safe'],
            [['id_odeljenje'], 'integer'],
            [['naziv'], 'string', 'max' => 45],
            [['id_odeljenje'], 'exist', 'skipOnError' => true, 'targetClass' => Odeljenje::className(), 'targetAttribute' => ['id_odeljenje' => 'id_odeljenje']],
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
            'id_odeljenje' => 'Id Odeljenje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdeljenje()
    {
        return $this->hasOne(Odeljenje::className(), ['id_odeljenje' => 'id_odeljenje']);
    }
}
