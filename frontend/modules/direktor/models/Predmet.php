<?php

namespace frontend\modules\direktor\models;

use Yii;

/**
 * This is the model class for table "predmet".
 *
 * @property int $id_predmet
 * @property string $naziv
 * @property string $status
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
            [['naziv'], 'required'],
            [['status'], 'string'],
            [['naziv'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_predmet' => 'Id Predmet',
            'naziv' => 'Naziv',
            'status' => 'Status',
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
