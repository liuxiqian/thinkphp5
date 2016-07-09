<?php
namespace app\model;
use think\Model;
/**
 * student
 */
class Student extends Model
{
    public function Klass()
    {
        return $this->belongsTo('klass');
    }

    public function getSexAttr($value)
    {
        $status = array('0'=>'男','1'=>'女');
        $sex = $status[$value];
        if (isset($sex))
        {
            return $sex;
        }
        else
        {
            return $status[0];
        }
    }

    protected $type = [
        'create_time' => 'datetime',
    ];

    protected $dateFormat = 'Y-m-d';
}