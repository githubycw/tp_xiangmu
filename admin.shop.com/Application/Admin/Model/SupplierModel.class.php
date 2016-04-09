<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of SupplierModel
 *
 * @author pc
 */
class SupplierModel extends \Think\Model{
    //自动验证
    protected $_validate =array(
      /**
       * 供货商名称必填
       * 名称必须唯一
       */  
        array('name','require','供货商名称不能为空',self::EXISTS_VALIDATE,'',self::MODEL_INSERT),
        array('name','','供货商已存在',self::EXISTS_VALIDATE,'unique'),
    );
    
    
    public function getPageResult(array $cond=array()){
        //合并两个数组
        $cond = $cond + array(
            'status' =>array('gt',-1),
        );
        //获取中行数
        $count = $this->where($cond)->count();
        // 获取每页显示条数
        $size = C('PAGE_SIZE');
        //分页尺寸
        $page_obj = new \Think\Page($count,$size);
        //分页的样式
        $page_obj->setConfig('theme',C('PAGE_THEME'));
        // 显示分页代码
        $page_html = $page_obj->show();
        $rows = $this->where($cond)->page(I('get.p'),$size)->select();  
        return array(
            'page_html' =>$page_html,
            'rows' =>$rows,
        );
    }
}
