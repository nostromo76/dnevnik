<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "raspored".
 *
 * @property int $id
 * @property string $dan
 * @property string $br_casa
 * @property int $id_predmet
 * @property int $id_odeljenje
 *
 * @property Odeljenje $odeljenje
 * @property Predmet $predmet
 */
class Raspored extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'raspored';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dan', 'br_casa', 'id_predmet', 'id_odeljenje'], 'required'],
            [['dan', 'br_casa'], 'string'],
            [['id_predmet', 'id_odeljenje'], 'integer'],
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
            'id' => 'ID',
            'dan' => 'Dan',
            'br_casa' => 'Br Casa',
            'id_predmet' => 'Predmet',
            'id_odeljenje' => 'Odeljenje',
        ];
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
