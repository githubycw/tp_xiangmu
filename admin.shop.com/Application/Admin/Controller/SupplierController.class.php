<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of SupplierController
 *
 * @author pc
 */
class SupplierController extends \Think\Controller{
    /**
     * 存储模型对象
     */
    private $_model = null;
    
//    public function __construct() {
//        parent::__construct();
//    }
//构造方法里面的
    protected function _initialize(){
        $meta_titles = array(
            'index'  => '供货商管理',
            'add'    => '添加供货商',
            'edit'   => '修改供货商',
            'delete' => '删除供货商'
        );
        $meta_title = $meta_titles[ACTION_NAME];
        $this->assign('meta_title',$meta_title);
        //创建模型
        $this->_model = D('Supplier');
    }
    /**
     * 查询数据
     */
    public function index(){
        //$supplier_model = D('Supplier');
       // $rows = $this->_model->getPageResult();
//        dump($rows);exit;
        $cond = array();
        $keyword = I('get.keyword');
        if($keyword){
            $cond['name'] =array('like','%'.$keyword.'%');
        }
        
        $this->assign($this->_model->getPageResult($cond));
        $this->display();
        
    }
    /**
     * 添加供货商
     */
    public function add(){
        
        if(IS_POST){
           //收集数据
           if($this->_model->create() === false){
               $this->error(get_error($this->_model->getError()));
           }
           //添加
           if($this->_model->add() === false){
               $this->error(get_error($this->_model->getError()));
           }else{
               $this->success('添加成功!',U('index'));
           }
        }  else {           
             $this->display();
        }
       
    }
    /**
     * 修改数据
     */
     public function edit($id){
        
        if(IS_POST){
           //收集数据
                if($this->_model->create() === false){
                    $this->error(get_error($this->_model->getError()));
                }
                //修改
                if($this->_model->save() === false){
                    $this->error(get_error($this->_model->getError()));
                }else{
                    $this->success('修改成功!',U('index'));
                }
           }  else {  
                   $row = $this->_model->find($id);

                   $this->assign('row',$row);
                   $this->display('add');
           }         
           
        }
        
        /**
         * 删除数据
         * 其实只是修改name 和 statues的值 修改之后不显示出来
         */
        public function delete($id){
            //修改的数据
            $data = array(
              'status'=>-1,
              'name'  =>array('exp',"CONCAT(name,'_del')"),
            );
            //删除的供货商name后面加上del后缀  setField修改多个字段
            if($this->_model->where(array('id'=>$id))->setField($data) === false){
                $this->error(get_error($this->_model->getError()));
            }  else {
                $this->success('删除成功!');
            }
        }
}
