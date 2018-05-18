<?php

namespace Api\Model;

use Think\Model;

class MemberTokenModel extends Model{

    const EXPIRE_TIME = 7;

    public function addToken($member_id){
        $data['token'] = strtoupper(md5(uniqid(md5(microtime(true)),true)));
        $data['member_id'] = $member_id;
        $data['add_time'] = time();
        $data['expire_time'] = time() + (60 * 60 * 24) * self::EXPIRE_TIME;
        $this->add($data);
        return $data;
    }

}