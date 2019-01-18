<?php

namespace frontend\modules\poruke\models;

use Yii;

/**
 * This is the model class for table "poruke".
 *
 * @property int $id_poruke
 * @property string $poruka
 * @property string $vreme
 * @property int $roditelj_id
 * @property int $ucitelj_id
 *
 * @property Roditelj $roditelj
 * @property Ucitelj $ucitelj
 */
class Poruke extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poruke';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poruka', 'roditelj_id', 'ucitelj_id'], 'required'],
            [['poruka'], 'string'],
            [['vreme'], 'safe'],
            [['roditelj_id', 'ucitelj_id'], 'integer'],
            [['roditelj_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['roditelj_id' => 'id_roditelj']],
            [['ucitelj_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ucitelj::className(), 'targetAttribute' => ['ucitelj_id' => 'id_ucitelj']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_poruke' => 'Id Poruke',
            'poruka' => 'Poruka',
            'vreme' => 'Vreme',
            'roditelj_id' => 'Roditelj',
            'ucitelj_id' => 'Ucitelj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoditelj()
    {
        return $this->hasOne(Roditelj::className(), ['id_roditelj' => 'roditelj_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcitelj()
    {
        return $this->hasOne(Ucitelj::className(), ['id_ucitelj' => 'ucitelj_id']);
    }

    public function getFullName() {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
