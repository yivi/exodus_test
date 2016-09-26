#!/usr/bin/env bash

PASSWORD='12345678'

apt-get update && apt-get upgrade

apt-get -y install apache2 php7.0 php7.0-mysql php7.0-mbstring libapache2-mod-php

debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"

apt-get -y install mysql-server-5.7 mysql-client

echo "CREATE DATABASE pruebaxxx CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci" | mysql -u root -p$PASSWORD

cat /vagrant/database.sql | mysql -u root -p$PASSWORD pruebaxxx

mkdir -p /var/www/adminer.pruebaxxx
wget --quiet http://www.adminer.org/latest.php -O /var/www/adminer.pruebaxxx/index.php

a2enmod rewrite expires headers

# vhost for adminer. for greater victory.
	VHOST=$(cat <<EOF
	<VirtualHost *:80>
	    DocumentRoot "/var/www/adminer.pruebaxxx"
	    ServerName adminer.pruebaxxx
	    <Directory "/var/www/adminer.pruebaxxx">
	        AllowOverride All
	        Require all granted
	    </Directory>
        ErrorLog /var/log/apache2/error-adminer.pruebaxxx.log
        LogLevel info
        # Let's NOT log some things
        SetEnvIf Request_URI "^/status.html$" dontlog
        SetEnvIf Request_URI "^/status.php$" dontlog
        SetEnvIf Request_URI "^/server-status$" dontlog
        CustomLog /var/log/apache2/access-adminer.pruebaxxx.log vhost_combined env=!dontlog
	</VirtualHost>
EOF
	)
echo "${VHOST}" > /etc/apache2/sites-available/001-adminer.pruebaxxx.conf

a2dissite 000-default.conf
ln -s /etc/apache2/sites-available/001-adminer.pruebaxxx.conf /etc/apache2/sites-enabled/001-adminer.pruebaxxx.conf

service apache2 restart

wget --quiet https://phar.phpunit.de/phpunit.phar

mv phpunit.phar /usr/local/bin/phpunit
chmod +x /usr/local/bin/phpunit

apt-get -y install language-pack-es

