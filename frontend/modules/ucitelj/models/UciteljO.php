<?php

namespace frontend\modules\ucitelj\models;

use Yii;

/**
 * This is the model class for table "otvorene_vrata_insert".
 *
 * @property int $ovi_id
 * @property int $id_roditelj
 * @property string $akcija
 * @property string $vreme
 *
 * @property Roditelj $roditelj
 */
class UciteljO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otvorene_vrata_insert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ovi_id', 'id_roditelj', 'akcija', 'vreme'], 'required'],
            [['id_roditelj'], 'integer'],
            [['vreme'], 'safe'],
            [['akcija'], 'string', 'max' => 20],
            [['id_roditelj'], 'exist', 'skipOnError' => true, 'targetClass' => Roditelj::className(), 'targetAttribute' => ['id_roditelj' => 'id_roditelj']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ovi_id' => 'OVI ID',
            'id_roditelj' => 'Id Roditelj',
            'akcija' => 'Akcija',
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
}
