FROM centos

MAINTAINER m2lan 763960267@qq.com

WORKDIR /var/www

RUN yum install -y epel-release \
    && yum install -y http://rpms.remirepo.net/enterprise/remi-release-6.rpm \
    && yum install -y yum-utils \
    && yum-config-manager --enable remi-php72 \
    && yum update -y \
    && yum install -y php \
    && yum install -y php-fpm

RUN chmod -R 0755 /run \
    && mkdir -p /run/php-fpm

EXPOSE 9000

CMD ["/usr/sbin/php-fpm", "-F", "-R"]
