### docker php swoole

#### m2lan/php72

```shell
docker build -t m2lan/php72 -f /root/mydocker/php/Dockerfile .
```

#### m2lan/swoole

```shell
docker build -t m2lan/swoole -f /root/mydocker/php/swoole-dockerfile2 .
```

#### 运行构建服务

```shell
docker-compose -f /root/mydocker/compose-php/swoole-compose.yml up
```

