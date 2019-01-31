<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ucitelj".
 *
 * @property int $id_ucitelj
 * @property int $user_id
 * @property int $id_odeljenje
 *
 * @property Dnevnik[] $dnevniks
 * @property Odeljenje[] $odeljenjes
 * @property Odgovor[] $odgovors
 * @property OtvorenaVrata[] $otvorenaVratas
 * @property OtvoreneVrataInsert[] $otvoreneVrataInserts
 * @property Poruke[] $porukes
 * @property User $user
 */
class Ucitelj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ucitelj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'id_odeljenje'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ucitelj' => 'Učitelj',
            'user_id' => 'Korisnik',
            'id_odeljenje' => 'Odeljenje'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDnevniks()
    {
        return $this->hasMany(Dnevnik::className(), ['id_ucitelj' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdeljenjes()
    {
        return $this->hasMany(Odeljenje::className(), ['ucitelj_id' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdgovors()
    {
        return $this->hasMany(Odgovor::className(), ['id_ucitelj' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtvorenaVratas()
    {
        return $this->hasMany(OtvorenaVrata::className(), ['id_ucitelj' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtvoreneVrataInserts()
    {
        return $this->hasMany(OtvoreneVrataInsert::className(), ['id_ucitelj' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorukes()
    {
        return $this->hasMany(Poruke::className(), ['ucitelj_id' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
