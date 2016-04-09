<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'tpxiangmu',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置
    'SHOW_PAGE_TRACE'       =>  true,   //调试模式
    
    'TMPL_PARSE_STRING' => array(
        '__IMG__' => 'http://admin.shop.com/Public/Images',
        '__CSS__' => 'http://admin.shop.com/Public//Styles',
        '__JS__'  => 'http://admin.shop.com/Public/Js'
    ),
    'SHOW_PAGE_TRACE' => true, //调试模式
    'TMPL_CACHE_ON'   => false, // 是否开启模板编译缓存,设为false则每次都会重新编译
    'PAGE_SIZE'       =>2,
    'PAGE_THEME'      =>'%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%',
);