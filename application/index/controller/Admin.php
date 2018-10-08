<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

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
        return $this->fetch();
    }

}