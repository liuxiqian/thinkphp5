<?php
namespace app\index\controller;
use think\Controller;
use app\model\User;

class IndexController extends Controller
{
    public function __construct()
    {
        // 判断是否登录
        if (false === User::isLogin())
        {
            return $this->error('plz login', url('Login/index'));
        }
        
        // 未登录，跳转登录页面
        parent::__construct();
    }

    public function index()
    {
        return 'hello';
    }

    public function test()
    {
        return "test";
    }
}
