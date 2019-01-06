<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "direktor".
 *
 * @property int $id_direktor
 * @property int $prosek_odeljenje
 * @property int $prosek_skola
 * @property int $id_user
 *
 * @property User $user
 */
class Direktor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direktor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prosek_odeljenje', 'prosek_skola'], 'required'],
            [['prosek_odeljenje', 'prosek_skola', 'id_user'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_direktor' => 'Id Direktor',
            'prosek_odeljenje' => 'Prosek Odeljenje',
            'prosek_skola' => 'Prosek Skola',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
