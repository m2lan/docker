<?php
namespace cache;

use think\App;
use think\Log;

class RedisUtil {

    public static $instance = [];
    public static $handler;

    public static function connect(array $options = [], $name = false) {

        if (false === $name) {
            $name = md5(serialize($options));
        }

        if (true === $name || !isset(self::$instance[$name])) {

            App::$debug && Log::record('[ Redis CACHE ] INIT Redis', 'info');

            if (true === $name) {
                return new Redis($options);
            }

            self::$instance[$name] = new Redis($options);
        }

        return self::$instance[$name];
    }

    public static function init(array $options = []) {
        if (is_null(self::$handler)) {
            self::$handler = self::connect($options);
        }

        return self::$handler;
    }
}