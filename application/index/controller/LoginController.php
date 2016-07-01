<?php
namespace app\index\controller;
use app\model\User;     //user
use think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        // 验证用户名密码
        $username = input('post.username');
        $password = input('post.password');

        // 正确 ，跳转首页
        if (User::login($username, $password))
        {
            return $this->success('success', url('User/index'));
        }

        // 错误，跳转index()
        else
        {
            return $this->error('error', url('index'));
        }
    }

    public function logOut()
    {
        if (true === User::logOut())
        {
            return $this->success('logout success', url('index'));
        } else {
            return $this->error('logout error', url('index'));
        }
    }
}