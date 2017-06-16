<?php

namespace app\Admin\controller;

use think\Controller;
use think\Request;
use app\index\validate;
use think\Image;

class Upload extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }

    // 文件上传提交
    public function up(Request $request)
    {
    // 获取表单上传文件
        $file = $request->file('file');
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
    // 移动到框架应用根目录/public/uploads/ 目录下
//        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//        if ($info) {
//            $this->success('文件上传成功：' . $info->getRealPath());
//        } else {
//    // 上传失败获取错误信息
//            $this->error($file->getError());
//        }
//        // 获取表单上传文件
//        $file = $request->file('file');
//        if (empty($file)) {
//            $this->error('请选择上传文件');
//        }
// 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['ext' => 'jpg,png,jpeg'])->move(ROOT_PATH . 'public' . DS .
            'uploads');
        if ($info) {
            $this->success('文件上传成功：' . $info->getRealPath());
        } else {
// 上传失败获取错误信息
            $this->error($file->getError());
        }
    }

    // 图片上传处理
    public function picture(Request $request)
    {
// 获取表单上传文件
        $file = $request->file('image');
        if (true !== $this->validate(['image' => $file], ['image' => 'require|image']))
        {
            $this->error('请选择图像文件');
        } else {
// 读取图片
            $image = Image::open($file);
// 图片处理
            switch ($request->param('type')) {
                case 1: // 图片裁剪
                    $image->crop(300, 300);
                    break;
                case 2: // 缩略图
                    $image->thumb(150, 150, Image::THUMB_CENTER);
                    break;
                case 3: // 垂直翻转
                    $image->flip();
                    break;
                case 4: // 水平翻转
                    $image->flip(Image::FLIP_Y);
                    break;
                case 5: // 图片旋转
                    $image->rotate();
                    break;
                case 6: // 图片水印
                    $image->water('./logo.png', Image::WATER_NORTHWEST, 50);
                    break;
                case 7: // 文字水印
                    $image->text('ThinkPHP', VENDOR_PATH . 'topthink/think-captcha/asse
ts/ttfs/1.ttf', 20, '#ffffff');
                    break;
            }
// 保存图片（以当前时间戳）
            $saveName = $request->time() . '.png';
            $image->save(ROOT_PATH . 'public/uploads/' . $saveName);
            $this->success('图片处理完毕...', '/uploads/' . $saveName, 1);
        }
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
