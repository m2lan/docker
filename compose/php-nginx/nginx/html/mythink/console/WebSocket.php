<?php
namespace app\console;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class WebSocket extends Command {

    protected $server;

    protected function configure() {
        $this->setName('websocket:start')->setDescription('Start Web Socket Server!');
    }

    protected function execute(Input $input, Output $output) {
        $this->server = new \swoole_websocket_server('0.0.0.0', 10000);

        //$this->server->set([
        //    'daemonize' => true
        //]);

        $this->server->on('Open', [$this, 'onOpen']);
        $this->server->on('Message', [$this, 'onMessage']);
        $this->server->on('Close', [$this, 'onClose']);
        
        $this->server->start();

        $output->writeln("websocket: start.\n");
    }

    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request) {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame) {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server");
    }

    public function onClose() {
        echo "client {$fd} closed\n";
    }
}
