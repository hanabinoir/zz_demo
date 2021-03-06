<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'user/login' => 'user/login',
    'user/registration' => 'user/registration',
    'user/create' => 'user/create',
    'dashboard/news' => 'dashboard/news',
    'dashboard/publish' => 'dashboard/publish',
    'news/search' => 'dashboard/searchnews', 
    'news/read/:author/:publish_time' => 'dashboard/readnews', 
    'news/publish' => 'news/publish',
    'news/edit/:author/:publish_time' => 'news/editnews', 
    'news/update/:author/:publish_time' => 'news/update', 
];
