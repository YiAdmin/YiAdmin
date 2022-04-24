<?php
/*
 * @Author: 01Soft
 * @Website: https://www.01soft.top
 * @Date: 2021-03-08
 * @LastEditors: 01Soft
 */

namespace app\system\controller\admin;

/**
 * @Menu(off,title=User Setting,weigh=10000,ignore=tree|tree_list|tree_array|all|toggle|select|imports|exports,ismenu=0)
 */
class Setting extends Base 
{
    protected $validate_cls = \app\system\validate\admin\SettingValidate::class;
    protected $has_tree = false;

    public $noNeedCheck = ['*'];
    
    public function before()
    {
        parent::before();
        $this->logic = \app\system\logic\admin\SettingLogic::instance(true);
    }
}