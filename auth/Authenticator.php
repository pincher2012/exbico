<?php


namespace app\auth;

use app\models\User;
use Yii;
use yii\web\IdentityInterface;

/**
 * Class Authenticator.
 */
class Authenticator
{
    /**
     * @param string $username
     * @param string $password
     *
     * @return null|IdentityInterface
     */
    public static function authenticate(string $username, string $password): ?IdentityInterface
    {
        $user = User::findOne(['username' => $username]);
        if ($user instanceof User) {
            $isPasswordValid = Yii::$app->getSecurity()->validatePassword($password, $user->password_hash);

            return $isPasswordValid ? $user : null;
        }

        return null;
    }
}
