<?php

namespace app\Admin\model;

use think\Model;

class Blog extends Model
{
    protected $autoWriteTimestamp = true;
    protected $insert = [
        'status' => 1,
    ];
    protected $field = [
        'id' => 'int',
        'name' => 'varchar(255)',
        'title' => 'varchar(255)',
        'create_time' => 'int',
        'update_time' => 'int',
        'name', 'title', 'content',
    ];
}
