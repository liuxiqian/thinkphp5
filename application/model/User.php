<?php
namespace app\model;
use app\model\User; // user
use think\Model;

class User extends Model
{
    /**
    * 验证用户名密码
    * @param string $username 用户名
    * @param string $password 密码
    * @param bool $isLogin 
    * @return bool
    * @author panjie
    * date:0616
    **/
    static public function checkPassword($username, $password, $isLogin = false)
    {
        // 看是否有这个用户
        $map = array('username'=>$username);
        $user = User::get($map);

        // validate
        if (false !== $user && $user->getData('password') === $password)
        {
            // set session
            if ($isLogin === true)
            {
                session('userId', $user->getData('id'));
            }
            return true;
        } else {
            return false;
        }
    }

    static function login($username, $password)
    {
        return self::checkPassword($username, $password, true);
    }
    /**
    **/
    static public function logOut()
    {
        session('userId', null);
        return true;
    }

    /**
    **/
    static public function isLogin()
    {
        $userId = session('userId');
        if (isset($userId))
        {
            return true;
        } else {
            return false;
        }
    }
}