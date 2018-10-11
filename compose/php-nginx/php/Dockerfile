FROM centos

MAINTAINER m2lan 763960267@qq.com

WORKDIR /var/www

RUN yum install -y epel-release \
    && yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && yum install -y yum-utils \
    && yum-config-manager --enable remi-php72 \
    && yum update -y \
    && yum install -y php \
    && yum install -y php-fpm

RUN yum install -y gcc \
    automake \
    autoconf \
    libtool \
    make

RUN yum install -y php-mcrypt \
    php-cli \
    php-gd \
    php-curl \
    php-mysql \
    php-ldap \
    php-zip \
    php-fileinfo \
    php-mbstring \
    php-mysqlnd \
    php-xml \
    php-xmlrpc \
    php-opcache \
    php-json \
    php-devel

RUN yum install -y wget

RUN wget https://github.com/phpredis/phpredis/archive/4.0.0.tar.gz \
    && tar xzf 4.0.0.tar.gz \
    && cd phpredis-4.0.0 \
    && phpize \
    && ./configure --with-php-config=/usr/bin/php-config \
    && make \
    && make install

RUN chmod -R 0755 /run \
    && mkdir -p /run/php-fpm

EXPOSE 9000

CMD ["/usr/sbin/php-fpm", "-F", "-R"]