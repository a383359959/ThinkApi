<?php

namespace Api\Model;

use Think\Model;

class MemberModel extends Model{

    const SUCCESS_CODE = 1;

    const ERROR_CODE = 0;

    public function checkUser($username,$password){
        $password = md5($password);
        $member = $this->where('username = "'.$username.'" and password = "'.$password.'"')->find();
        if($member){
            $member_token = D('member_token')->addToken($member['member_id']);
            $member['token'] = $member_token['token'];
            $member['token_expire_time'] = $member_token['expire_time'];
            $result = array(
                'code' => self::SUCCESS_CODE,
                'message' => '登录成功',
                'data' => $member
            );
        }else{
            $result = array(
                'code' => self::ERROR_CODE,
                'message' => '用户名或者密码错误'
            );
        }
        return $result;
    }

    public function getName(){
        return $this->where('member_id = '.$this->member_id)->getField('name');
    }

}