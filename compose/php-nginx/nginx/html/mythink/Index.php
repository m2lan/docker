<?php
namespace app\index\controller;

use cache\RedisUtil;

class Index {
    public function index() {
        $option = config('redis');
        $redis = RedisUtil::init($option);
        
        $result = $redis->set('username', 'zhangsan');
        dump($result);

        $result = $redis->get('username');
        dump($result);
    }
}