### redis4.0

#### 使用Dockerfile

* 编译

```sh
docker build -t myredis4.0 .
```

* 运行

```sh
docker run -d -p 16379:6379 --name myredis-new myredis4.0
```

#### 直接运行

* 安装

```sh
docker pull redis:4.0
```

* 运行

```sh
docker run -d -p 6379:6379 --name myredis \
    -v /root/mydocker/redis/data:/data \
    -v /root/mydocker/redis/conf/redis.conf:/usr/local/etc/redis/redis.conf \
    redis:4.0 redis-server /usr/local/etc/redis/redis.conf --appendonly yes
```



