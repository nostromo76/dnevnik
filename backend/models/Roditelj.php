<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "roditelj".
 *
 * @property int $id_roditelj
 * @property int $id_ucenik
 * @property int $user_id
 *
 * @property Dnevnik[] $dnevniks
 * @property OtvorenaVrata[] $otvorenaVratas
 * @property Poruke[] $porukes
 * @property Ucenik $ucenik
 * @property User $user
 * @property Ucenik[] $uceniks
 */
class Roditelj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roditelj';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ucenik', 'user_id'], 'required'],
            [['id_ucenik', 'user_id'], 'integer'],
            [['id_ucenik'], 'exist', 'skipOnError' => true, 'targetClass' => Ucenik::className(), 'targetAttribute' => ['id_ucenik' => 'id_ucenik']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_roditelj' => 'Id Roditelj',
            'id_ucenik' => 'Id Ucenik',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDnevniks()
    {
        return $this->hasMany(Dnevnik::className(), ['id_roditelj' => 'id_roditelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtvorenaVratas()
    {
        return $this->hasMany(OtvorenaVrata::className(), ['id_roditelj' => 'id_roditelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorukes()
    {
        return $this->hasMany(Poruke::className(), ['id_roditelj' => 'id_roditelj']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUceniks()
    {
        return $this->hasMany(Ucenik::className(), ['id_roditelj' => 'id_roditelj']);
    }
}
