FROM linuxconfig/lemp
EXPOSE 80 443
COPY ./web/ /app/public/
COPY ./default.conf /etc/nginx/sites-enabled/default
COPY ./nginx.conf /etc/nginx/nginx.conf
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 50M/' /etc/php/7.0/cgi/php.ini
RUN chmod -R 777 /app/public/uploads
RUN service mysql start && \
	mysql -u admin -ppass -e "CREATE DATABASE IF NOT EXISTS Users;" && \
	mysql -u admin -ppass Users < "/app/public/db_setup.sql" && \
	mkdir /etc/nginx/ssl/

COPY ./nginx/nginx-selfsigned.crt /etc/nginx/ssl/
COPY ./nginx/nginx-selfsigned.key /etc/nginx/ssl/
