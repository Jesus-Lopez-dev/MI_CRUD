FROM ubuntu

#INSTALACION DE PHP, MYSQL, APACHE, GIT
RUN apt update && apt upgrade -y
RUN DEBIAN_FRONTEND="noninteractive" TZ="America/New_York" apt install -y tzdata supervisor
RUN apt install -y apache2 php php-mysql git 
RUN apt install -y mysql-server

#CRWACION DE VIRTUALHOST
COPY apache.conf /etc/apache2/sites-available/APP.conf
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf

#CLONACION DE PROYECTO EN GITHUB
RUN mkdir /var/www/html/APP
RUN git clone https://github.com/Jesus-Lopez-dev/MI_CRUD.git
RUN cp -R ./MI_CRUD/* /var/www/html/APP

#HABILITAR VIRTUALHOST
RUN /bin/sh -c a2ensite APP.conf
RUN /bin/sh -c a2dissite 000-default.conf

#ESTABLECER CONTRASEÑA ROOT A USUARIO RAIZ DE MYSQL
RUN echo 'mysql-server mysql-server/root_password password root' | debconf-set-selections && \ 
echo 'mysql-server mysql-server/root_password_again password root' | debconf-set-selections

#CAMBIO DE AUTENTICACION DE USUARIO ROOT DE AUTH_SOCKET A MYSQL_NATIVE_PASSWORD
RUN service mysql start && \
/bin/sh -c "/usr/bin/mysql -u root -proot" && \ 
sleep 15 && \ 
mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root'"

#CREACION E IMPORTACION DE BD
RUN (service mysql start &); sleep 15; mysqladmin -u root -proot create crud_final
RUN (service mysql start &); sleep 15; mysql -u root -proot crud_final < /var/www/html/APP/crud_final.sql

#ARRANCAR SERVICIOS
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD ["/usr/bin/supervisord"]