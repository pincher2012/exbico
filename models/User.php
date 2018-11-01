<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User.
 *
 * @property int    $id            [int(11)]
 * @property string $username      [varchar(255)]
 * @property string $password_hash [varchar(255)]
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @param int $id
     *
     * @return IdentityInterface
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }


    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
