<?php

namespace Api\Controller;

use Think\Controller;

class LoginController extends Controller{

    public function index(){
        $member = D('member');
        $checkUserName = $member->checkUser(I('username'),I('password'));
        $this->ajaxReturn($checkUserName);
    }

}