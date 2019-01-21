<?php

namespace backend\models;

use Yii;
use backend\models\LoginDetalji;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $role
 *
 * @property LoginDetalji[] $loginDetaljis
 * @property Ucitelj[] $uciteljs
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'role'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            ['email', 'email'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Ime',
            'last_name' => 'Prezime',
            'username' => 'Korisničko ime',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Šifra',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginDetaljis()
    {
        return $this->hasMany(LoginDetalji::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUciteljs()
    {
        return $this->hasMany(Ucitelj::className(), ['user_id' => 'id']);
    }

    public function getFullname(){
        return $this->first_name . ' ' . $this->last_name;
    }
}
