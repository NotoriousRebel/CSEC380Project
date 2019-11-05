FROM fbraz3/lnmp:7.3
COPY ./web/ /app/public/
#COPY ./default.conf /etc/nginx/sites-enabled/default
EXPOSE 80 82 443
RUN service mysql start && \
	mysql -u root -e "CREATE DATABASE IF NOT EXISTS Users;" && \
	mysql -u root -e "CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';" && \
	mysql -u root -e "GRANT ALL PRIVILEGES ON * . * TO 'user'@'localhost';" && \
	mysql -u root Users < "/app/public/db_setup.sql" && \
	service nginx restart
