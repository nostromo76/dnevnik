<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "predmet".
 *
 * @property int $id_predmet
 * @property string $obavezni
 * @property string $izborni
 *
 * @property Ocena[] $ocenas
 * @property Raspored[] $rasporeds
 */
class Predmet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'predmet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['obavezni'], 'required'],
            [['obavezni', 'izborni'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_predmet' => 'Id Predmet',
            'obavezni' => 'Obavezni',
            'izborni' => 'Izborni',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenas()
    {
        return $this->hasMany(Ocena::className(), ['id_predmet' => 'id_predmet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRasporeds()
    {
        return $this->hasMany(Raspored::className(), ['id_predmet' => 'id_predmet']);
    }
}
