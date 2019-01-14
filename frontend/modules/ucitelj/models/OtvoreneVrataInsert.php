<?php

namespace frontend\modules\ucitelj\models;

use Yii;

/**
 * This is the model class for table "otvorene_vrata_insert".
 *
 * @property int $id
 * @property int $id_roditelj
 * @property string $akcija
 * @property string $vreme
 *
 * @property Roditelj $roditelj
 */
class OtvoreneVrataInsert extends \yii\db\ActiveRecord
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
            [['id_roditelj', 'akcija', 'vreme'], 'required'],
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
            'id' => 'ID',
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
