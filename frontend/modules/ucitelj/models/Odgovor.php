<?php

namespace frontend\modules\ucitelj\models;

use Yii;

/**
 * This is the model class for table "odgovor".
 *
 * @property int $odgovor_id
 * @property string $da
 * @property string $ne
 * @property int $id_roditelj
 * @property int $id_ucitelj
 * @property string $vreme
 *
 * @property Roditelj $roditelj
 * @property Ucitelj $ucitelj
 */
class Odgovor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'odgovor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_roditelj', 'id_ucitelj'], 'integer'],
            [['vreme'], 'safe'],
            [['da', 'ne'], 'string', 'max' => 11],
            [['id_roditelj'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['id_roditelj' => 'id_roditelj']],
            [['id_ucitelj'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['id_ucitelj' => 'id_ucitelj']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'odgovor_id' => 'Odgovor ID',
            'da' => 'Da',
            'ne' => 'Ne',
            'id_roditelj' => 'Id Roditelj',
            'id_ucitelj' => 'Id Ucitelj',
            'vreme' => 'Vreme',
        ];
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
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'id_ucitelj']);
    }
}
