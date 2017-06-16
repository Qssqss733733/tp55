<?php

namespace app\Admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\user as UserModel;
use app\admin\model\Profile;
use think\Db\Query;
use think\Session;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
//        $list = UserModel::all();
//        Session::set('name','thinkphp');
//        dump(Session::get('name'));
        echo $request->session('user_name');
        $list = UserModel::paginate(3);
        $this->assign('list', $list);
        $this->assign('count', count($list));
        return $this->fetch();
    }
    public function layout()
    {
//        $list = UserModel::all();
        $list = UserModel::paginate(3);
        $this->assign('list', $list);
        $this->assign('count', count($list));
        return $this->fetch();
    }

    public function create()
    {
        return view();
    }

    /*add关联模型*/
    // 关联新增数据
    public function add()
    {
        $user = new UserModel;
        $user->name = 'thinkphp';
        $user->password = '123456';
        $user->nickname = '流年';
        if ($user->save()) {
            // 写入关联数据
//            $profile = new Profile;
//            $profile->truename = '刘晨';
//            $profile->birthday = '1977-03-05';
//            $profile->address = '中国上海';
//            $profile->email = 'thinkphp@qq.com';
//            $user->profile()->save($profile);
//            return '用户新增成功';
            $profile['truename'] = '刘晨';
            $profile['birthday'] = '1977-03-05';
            $profile['address'] = '中国上海';
            $profile['email'] = 'thinkphp@qq.com';die;
            $user->profile()->save($profile);
            return '用户[ ' . $user->name . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }

    public function read($id)
    {
        $user = UserModel::get($id);
        echo $user->name . '<br/>';
        echo $user->nickname . '<br/>';
        echo $user->profile->truename . '<br/>';
        echo $user->profile->email . '<br/>';
    }

    /*add自动验证*/
    //    public function add()
//    {
//        $data = input('post.');
//        $restult = $this->validate($data,'User');
//        if(true !== $restult){
//            return $restult;
//        }
//        $user = new UserModel;
//        $user->allowField(true)->save($data);
//        return view('user\index');
//    }








    /*add数据验证*/
    //    public function add()
//    {
//        $user = new UserModel();
//        if($user->allowField(true)->validate(true)->save(input('post.'))){
////            return '用户['.$user->nickname.':'.$user->id.']新增成功';
//            return view('user/index');
//        }else{
//            return $user->getError();
//        }
//    }


















    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */

//    public function create()
//    {
//        //
//        $user = new UserModel;
//        $user->nickname = '小花';
//        $user->email = 'thinkphp@qq.com';
//        $user->birthday = strtotime('1977-03-05');
//        if ($user->save()) {
////        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
//        return view();
//        } else {
//        return $user->getError();
//        }
//    }
//
//    /**
//     * 保存新建的资源
//     *
//     * @param  \think\Request  $request
//     * @return \think\Response
//     */
//    public function save(Request $request)
//    {
//        //
//    }
//
//    /**
//     * 显示指定的资源
//     *
//     * @param  int  $id
//     * @return \think\Response
//     */
//    public function read($id)
//    {
//        //
////        $user = UserModel::get($id);
////        echo $user->nickname . '<br/>';
////        echo $user->email . '<br/>';
////        echo date('Y/m/d', $user->birthday) . '<br/>';
////        $list = UserModel::all();
////        foreach ($list as $user) {
////            echo $user->nickname . '<br/>';
////            echo $user->email . '<br/>';
//////            echo date('Y/m/d', $user->birthday) . '<br/>';
////            echo $user->birthday . '<br/>';
////            echo '----------------------------------<br/>';
////        }
//        $user = UserModel::get($id);
//        echo $user->nickname . '<br/>';
//        echo $user->email . '<br/>';
//        echo $user->birthday . '<br/>';
//        echo $user->status . '<br/>';
//        echo $user->create_time . '<br/>';
//        echo $user->update_time . '<br/>';
////        $list = UserModel::scope('email,status')->all();
////        foreach ($list as $user) {
////            echo $user->nickname . '<br/>';
////            echo $user->email . '<br/>';
////            echo $user->birthday . '<br/>';
////            echo $user->status . '<br/>';
////            echo '-------------------------------------<br/>';
////        }
//    }
//
//    /**
//     * 显示编辑资源表单页.
//     *
//     * @param  int  $id
//     * @return \think\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * 保存更新的资源
//     *
//     * @param  \think\Request  $request
//     * @param  int  $id
//     * @return \think\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//        $user = UserModel::get($id);
//        $user->nickname = '刘南';
//        $user->email = 'liu21st@gmail.com';
//        if (false !== $user->save()) {
//            return '更新用户成功';
//        } else {
//            return $user->getError();
//        }
//    }
//
//    /**
//     * 删除指定资源
//     *
//     * @param  int  $id
//     * @return \think\Response
//     */
//    public function delete($id)
//    {
//        //
//        $user = UserModel::get($id);
//        if ($user) {
//            $user->delete();
//            return '删除用户成功';
//        } else {
//            return '删除的用户不存在';
//        }
//    }

}
