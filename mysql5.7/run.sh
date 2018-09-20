docker run -d -p 3306:3306 --name mymysql \
    -v /root/mydocker/mysql/conf:/etc/mysql/conf.d \
    -v /root/mydocker/mysql/logs:/logs \
    -v /root/mydocker/mysql/data:/var/lib/mysql \
    -e MYSQL_ROOT_PASSWORD=123456 mysql:5.7