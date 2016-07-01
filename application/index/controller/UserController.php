<?php
namespace app\index\controller;

use app\model\User;

class UserController extends IndexController
{
   

    // public function index()
    // {
    //     $br = "<br />";
    //     $User = new User();
    //     $users = $User::all();
    //     foreach ($users as $user)
    //     {
    //         echo "name:" . $user->name . $br;
    //         echo "sex:" . $user->sex . $br;
    //         echo 'email:' . $user->email . $br;
    //     }
    // }

    public function index()
    {
        // 如果没传页数，那么就是第一页
        $p        = (int)input('get.page') > 0 ? (int)input('get.page') : 1;

        // 确定要从哪个表取值？ ---user表 
        $User     = new User();
        $keywords = trim(input('get.keywords'));

        //根据name字段查询
        if($keywords !== "")
        {
            $map['name'] = array("like","%" . $keywords . "%");
        }
        else
        {
            $map = $User::get();
        }

        //将$keywords传入分页
        $q      = array('keywords'=>$keywords);
        $config = array('page'=>$p,'query'=>$q);

        //$users = $user::paginate(3, false, $config);
        $users  = $User->where($map)->paginate(3, false, $config);

        // 变users传入v层
        $this->assign('users', $users);

        // 显示V层数据
        return $this->fetch();
    }

    /**
     * 删除操作
     * @return  300 重定向 
     */
    public function delete()
    {
        // input 助手函数，详见开发入门手册的第七章 请求与响应 使用助手函数的代码为

        // 获取输入的整个GET
        $get = input('get.');
        //dump($get);

        // 获取输入的GET信息中的ID值
        $id = input('get.id');
        //dump($id);

        // 进行数据的删除
        // 1 删除哪个数据表？-- user
        // ---- 删除哪个表，就要NEW哪个MODEL
        // 2 依据什么删？--主键id
        // 3 怎么删？怎么操作？
        // 查看快速入门手册中的第五章 模型 2基础操作 删除数据
        $User = new User();

        // 根据主键, 先取出待删除的记录.
        // 有记录，则返回对象
        // 无记录，则返回false
        $user = $User->get($id);
        //dump($User);    // 查看获取的结果 
        // 有则执行 返回对象的 删除操作
        if ($user !== false)
        {
            $user->delete();
            return $this->success('删除成功',url('index'));
        }

        // 没有则报错
        else
        {
            return '删除失败';
        }

    }

    /**
     * 增加
     */
    public function add()
    {
        return $this->fetch(); // 返回模板信息
    }

    /**
     * 保存
     * @return string html
     * @author panjie
     */
    public function save()
    {
        // 接收用户传入的数据
        $post = input('post.');
        //dump($post);

        // 确认到存储到哪个数据表 ---user表
        $User = new User();

        // 给各个字段赋值
        $User->name  = $post['name'];
        $User->email = $post['email'];
        $User->sex   = $post['sex'];

        // 存数据 并查看返回值
        // $save = $User->save();

        // 成功，则返回插入的数据主键（string）
        // 失败，抛出异常
        // 改写为以下代码， 对异常进行处理。
        try
        {
            if ((int)$User->save() !== 0)
            {
                return $this->success('添加成功' , url('index'));
            }
            else
            {
                return "添加失败";
            }
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }

        return "save";
    }

    public function edit()
    {
        //dump(input('get.'));
        $id   = input('get.id');
        //dump($id);
        //根据id值取记录
        $User = new User();
        $user = $User->get($id);
        //dump($user);

        //传入V层
        $this->assign('user',$user);
        return $this->fetch();
    }

    public function update()
    {
        $id   = input("post.id");
        $User = User::get($id);
         //dump($id);
        //dump($User);
        $User->name  = input('post.name');
        $User->email = input('post.email');
        $User->sex   = input('post.sex');
        // 成功，则返回修改的数据主键（string）
        // 失败，抛出异常
        if (false !== $User->save())
        {
            return $this->success('更新成功', url('index'));
        }
        else
        {
            return $User->getError();
        }
    }
}
