FROM nudttan91/base_image_nginx_php_73

LABEL Author="tan91"
LABEL GitHub="https://github.com/NUDTTAN91"
LABEL Blog="zxw-nudt.blog.csdn.net"

RUN chmod -R 777 /var/www/html

COPY php.ini /usr/local/etc/php/php.ini
COPY nginx.conf /etc/nginx/nginx.conf

RUN chmod 777 /usr/local/etc/php/php.ini
RUN chmod 777 /etc/nginx/nginx.conf
