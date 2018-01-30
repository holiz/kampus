<?php

namespace app\models;
use app\models\Login;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $role;

    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
       $user = login::findOne($id);
        if(count($user)){
            return new static($user);
            }
        return null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = login::find()->where(['accessToken'=>$token])->one();
        if (count($user)){
            return new static($user);
            }
        return null;
        }

     

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      $user = login::find()->where(['username'=>$username])->one();
        if(count($user)){
            return new static($user);
            }
            return null;
    }
     

        

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
?>