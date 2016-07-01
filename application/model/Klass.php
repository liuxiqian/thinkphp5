<?php
namespace app\model;
use think\Model;

class Klass extends Model
{
    public function User()
    {
        return $this->belongsTo('user');
    }
}