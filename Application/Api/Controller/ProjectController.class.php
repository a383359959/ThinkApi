<?php

namespace Api\Controller;

use Think\Controller;

class ProjectController extends Controller{

    public function lists(){
        $list = D('project')->getList();
        $this->ajaxReturn($list);
    }

    public function add(){
        $project = D('project');
        $result = $project->addProject(I('name'));
        $this->ajaxReturn($result);
    }

    public function edit(){
        $project = D('project');
        $result = $project->editProject(I('id'),I('name'));
        $this->ajaxReturn($result);
    }

    public function del(){
        $project = D('project');
        $result = $project->delProject(I('id'));
        $this->ajaxReturn($result);
    }

}