FROM php:7.3-apache

LABEL author="FZL"
USER root
#ENV ACCEPT_EULA=Y

# Microsoft SQL Server Prerequisites
RUN apt-get update && apt-get install -y gnupg2 libpq-dev libmemcached-dev curl libzip-dev zlibc zlib1g  && apt-get install -y apt-transport-https \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql17 \
	&& apt-get install -y unixodbc-dev \
    && docker-php-ext-install zip

RUN pecl install sqlsrv pdo_sqlsrv && docker-php-ext-enable sqlsrv pdo_sqlsrv


RUN cp /etc/ssl/openssl.cnf /etc/ssl/openssl.cnf.ORI && \
    sed -i "s/\(MinProtocol *= *\).*/\1TLSv1.0 /" "/etc/ssl/openssl.cnf" && \
    sed -i "s/\(CipherString *= *\).*/\1DEFAULT@SECLEVEL=1 /" "/etc/ssl/openssl.cnf" && \
    (diff -u /etc/ssl/openssl.cnf.ORI /etc/ssl/openssl.cnf || exit 0)


# Install Memcached for php 7
# RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
#     && mkdir -p /usr/src/php/ext/memcached \
#     && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
#     && docker-php-ext-configure memcached \
#     && docker-php-ext-install memcached \
#     && rm /tmp/memcached.tar.gz



RUN apt-get install -y ufw
RUN ufw allow in on docker0

# RUN apt install -y iptables-persistent
# RUN mkdir -p /etc/iptables
# RUN iptables-save > -y /etc/iptables/rules.v4 
# RUN ip6tables-save > -y /etc/iptables/rules.v6
# RUN service iptables-persistent start



# COPY iptables.sh /usr/local/bin/iptables.sh
# RUN chmod +x /usr/local/bin/iptables.sh && apt-get install -y iptables
# CMD iptables.sh

# PHP-REDIS
# RUN apt-get install -y libzstd-dev
# RUN pecl install igbinary && docker-php-ext-enable igbinary.so
# RUN pecl install redis && docker-php-ext-enable redis.so

RUN a2enmod rewrite

# EXPOSE 30001

COPY PKU /var/www/html/
