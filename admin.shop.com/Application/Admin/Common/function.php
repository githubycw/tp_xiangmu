<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 function get_error($errors){
    //判断是否是数组
     if(!is_array($errors)){
         $errors = array($errors);  //不是就转为数组
     }
     //遍历错误信息
     $html = '<ol>';
     foreach ($errors as $error){
         $html.='<li>'.$error.'</li>';
     }
     $html.='<ol>';
     return $html;
}

