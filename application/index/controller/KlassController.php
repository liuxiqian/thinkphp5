<?php
namespace app\index\controller;
use app\model\Klass;
use app\model\User;
class klassController extends IndexController
{
    public function index()
    {
        $Klasses = Klass::all();
        $this->assign('Klasses', $Klasses);
        return $this->fetch();
    }

    public function add()
    {
        $users = User::all();
        $this->assign('users', $users);
        return $this->fetch();
    }

    public function save()
    {
        // new class
        $Klass = new Klass;
        $Klass->name = input('post.name');
        $Klass->user_id = input('post.user_id');

        if (false === $Klass->validate()->save())
        {
            return $this->error('data save error ' . $Klass->getError());
        } else {
            return $this->success('success', url('index'));
        }
    }

    public function edit()
    {
        $users = User::all();
        $this->assign('users', $users);

        $id = input('get.id/d');
        $Klass = Klass::get($id);

        $this->assign("Klass", $Klass);
        return $this->fetch();
    }

    public function update()
    {
        $id = input('post.id/d');
        $Klass = Klass::get($id);

        if (false === $Klass)
        {
            return $this->error('record not found!');
        }

        // update 
        $Klass->name = input('post.name');
        $Klass->user_id = input('post.user_id');

        if (false === $Klass->validate(true)->save())
        {
            return $this->error('error ' . $Klass->getError());
        } else {
            return $this->success('success', url('index'));
        }
    }

    public function delete()
    {
        $id = input('get.id/d');

        // get klass object
        if (false === $klass = Klass::get($id))
        {
            return $this->error('record not exist!');
        }

        //  delete object
        $klass->delete();
        return $this->success('success', url('index'));
    }
}