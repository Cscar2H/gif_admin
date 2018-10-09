<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\AdminModel;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/8
 * Time: 下午 3:46
 */
class Admin extends Controller
{
    public function admin()
    {
        $Admin = new AdminModel();
        $imgs = $Admin->select();

        //向V传递数据
        $this->assign('imgs', $imgs);
        //获取第[0]个数据
        $img = $imgs[1];

        // 取回打包后的数据
        $htmls = $this->fetch();

        /*// 将数据返回给用户
        return $htmls;*/

        //调用img对象的get方法
        var_dump($img->getData('img'));

        return $this->fetch();

    }

    public function insert()
    {
        //新建测试数据
        $image = array();
        $image['content'] = '233';
        $image['img'] = '1';
        var_dump($image);

        //引用image数据表对应的模型
        $img = new AdminModel();
        //向image表中插入数据并判断是否成功
        $img->data($image)->save();


    }

    public function upload()
    {
        // 获取表单上传文件
        $file = request()->file('image');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move('../uploads');
        /*if ($info) {
            // 成功上传后 获取上传信息
            //格式
            echo $info->getExtension();
            //路径
            echo $info->getSaveName();
            //文件名
            echo $info->getFilename();
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }*/
        //新建测试数据
        $image = array();
        $image['content'] = '233';
        $image['img'] = $info->getSaveName();

        //引用image数据表对应的模型
        $img = new AdminModel();
        //向image表中插入数据并判断是否成功
        $img->data($image)->save();
    }

}
