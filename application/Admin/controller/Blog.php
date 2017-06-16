<?php

namespace app\Admin\controller;

use think\Controller;
use think\Request;
use app\Admin\model\Blog as Blogs;

class Blog extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = Blogs::all();
        return json($list);
    }

    public function save(Request $request)
    {
        $data = $request->param();
        $result = Blogs::create($data);
        return json($result);
    }
    public function read($id)
    {
        $data = Blogs::get($id);
        return json($data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->param();
        $result = Blogs::update($data, ['id' => $id]);
        return json($result);
    }
    public function delete($id)
    {
        $result = Blogs::destroy($id);
        return json($result);
    }

}
