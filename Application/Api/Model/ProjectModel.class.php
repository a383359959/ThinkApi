<?php

namespace Api\Model;

use Think\Model;

class ProjectModel extends Model{

    const SUCCESS_CODE = 1;

    const ERROR_CODE = 0;

    public function getList(){
        $list = $this->where('member_id = '.$this->member_id)->order('add_time desc')->select();
        $arr = array(
            'list' => $list,
            'member_name' => D('member')->getName()
        );
        return array('code' => self::SUCCESS_CODE,'msg' => '成功','data' => $arr);
    }

    public function addProject($name){
        $data = array(
            'member_id' => $this->member_id,
            'member_name' => D('member')->getName(),
            'name' => $name,
            'add_time' => time()
        );
        $this->add($data);
        return array('code' => self::SUCCESS_CODE,'msg' => '添加成功');
    }

    public function editProject($id,$name){
        $data = array(
            'name' => $name
        );
        $this->where('id = '.$id)->save($data);
        return array('code' => self::SUCCESS_CODE,'msg' => '修改成功');
    }

    public function delProject($id){
        $this->where('id = '.$id)->delete();
        return array('code' => self::SUCCESS_CODE,'msg' => '删除成功');
    }

}