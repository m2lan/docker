docker run -d -p 6379:6379 --name myredis \
    -v /root/mydocker/redis/data:/data \
    -v /root/mydocker/redis/conf/redis.conf:/usr/local/etc/redis/redis.conf \
    redis:4.0 redis-server /usr/local/etc/redis/redis.conf --appendonly yes