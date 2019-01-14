<?php

namespace frontend\modules\ucitelj\models;

use frontend\modules\ucitelj\models\User;
use Yii;

/**
 * This is the model class for table "ucitelj".
 *
 * @property int $id_ucitelj
 * @property int $user_id
 * @property int $id_odeljenje
 *
 * @property Dnevnik[] $dnevniks
 * @property OtvorenaVrata[] $otvorenaVratas
 * @property Poruke[] $porukes
 * @property Odeljenje $odeljenje
 * @property User $user
 */
class Ucitelj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ucitelj';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'id_odeljenje'], 'integer'],
            [['id_odeljenje'], 'exist', 'skipOnError' => true, 'targetClass' => Odeljenje::className(), 'targetAttribute' => ['id_odeljenje' => 'id_odeljenje']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ucitelj' => 'Id Ucitelj',
            'user_id' => 'User ID',
            'id_odeljenje' => 'Id Odeljenje',
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
    public function getOtvorenaVratas()
    {
        return $this->hasMany(OtvorenaVrata::className(), ['id_ucitelj' => 'id_ucitelj']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorukes()
    {
        return $this->hasMany(Poruke::className(), ['id_ucitelj' => 'id_ucitelj']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
