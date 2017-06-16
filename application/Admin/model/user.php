<?php

namespace app\admin\model;

use think\Model;

class user extends Model
{
    protected $autoWriteTimestamp = true;

    //定义关联方法
        public function profile()
        {
        // 用户HAS ONE档案关联
            return $this->hasOne('Profile');
        }
//    protected $table = 'think_user';
    // birthday读取器
//    protected function getBirthdayAttr($birthday)
//    {
//        return date('Y-m-d', $birthday);
//    }
    // 定义类型转换
    protected $type = [
        'birthday' => 'timestamp:Y/m/d',
    ];
    // 定义时间戳字段名
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    // 定义自动完成的属性
//    protected $insert = ['status' => 1];
    // 定义自动完成的属性
    protected $insert = ['status'];
    // status属性修改器
    protected function setStatusAttr($value, $data)
    {
        return '流年' == $data['nickname'] ? 1 : 2;
    }
    // status属性读取器
    protected function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }
    // email查询
    protected function scopeEmail($query)
    {
        $query->where('email', 'thinkphp@qq.com');
    }
// status查询
    protected function scopeStatus($query)
    {
        $query->where('status', 1);
    }

}
