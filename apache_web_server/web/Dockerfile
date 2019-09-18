FROM ubuntu

RUN apt-get update

RUN apt-get install -y apache2

RUN apt-get install -y apache2-utils

EXPOSE 80

COPY ./index.html /var/www/html/index.html

ENTRYPOINT ["apache2ctl"]

CMD ["-DFOREGROUND"]
