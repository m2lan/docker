<?php
namespace cache;

class Redis {

    protected $handler = null;

    protected $options = [
        'host'       => '127.0.0.1',
        'port'       => 6379,
        'password'   => '',
        'select'     => 0,
        'timeout'    => 0,
        'expire'     => 0,
        'persistent' => false,
        'prefix'     => '',
    ];

    public function __construct($options = []) {
        if (!extension_loaded('redis')) {
            throw new \BadFunctionCallException('not support: redis');
        }
        if (!empty($options)) {
            $this->options = array_merge($this->options, $options);
        }
        $func          = $this->options['persistent'] ? 'pconnect' : 'connect';
        $this->handler = new \Redis();
        $this->handler->$func($this->options['host'], $this->options['port'], $this->options['timeout']);

        if ('' != $this->options['password']) {
            $this->handler->auth($this->options['password']);
        }

        if (0 != $this->options['select']) {
            $this->handler->select($this->options['select']);
        }
    }

    public function set($key, $value, $timeout = 0) {
        if (is_null($timeout)) {
            $timeout = $this->options['expire'];
        }

        if ($timeout) {
            $result = $this->handler->setex($key, $timeout, $value);
        } else {
            $result = $this->handler->set($key, $value);
        }

        return $result;
    }

    public function __call($method = '', $param = []) {
        if($method && $param) {
            return call_user_func_array([$this->handler, $method], $param);
        }
        return false;
    }
}