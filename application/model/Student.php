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
        if ($value == 0)
        {
            return 'male';
        } else {
            return 'female';
        }
    }

    protected $type = [
        'create_time' => 'datetime',
    ];

    protected $dateFormat = 'Y-m-d';
}