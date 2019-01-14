<?php

namespace frontend\modules\roditelj\models;

use Yii;

/**
 * This is the model class for table "otvorena_vrata".
 *
 * @property int $id_otvorena_vrata
 * @property string $naslov
 * @property string $otvorena_vrata
 * @property string $vreme
 * @property int $id_ucitelj
 * @property int $id_roditelj
 *
 * @property Roditelj $roditelj
 * @property Ucitelj $ucitelj
 */
class OtvorenaVrata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otvorena_vrata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['otvorena_vrata'], 'required'],
            [['otvorena_vrata'], 'string'],
            [['vreme'], 'safe'],
            [['id_ucitelj', 'id_roditelj'], 'integer'],
            [['naslov'], 'string', 'max' => 100],
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
            'id_otvorena_vrata' => 'Id Otvorena Vrata',
            'naslov' => 'Naslov',
            'otvorena_vrata' => 'Otvorena Vrata',
            'vreme' => 'Vreme',
            'id_ucitelj' => 'Id Ucitelj',
            'id_roditelj' => 'Id Roditelj',
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
