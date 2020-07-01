Docker Compose LAMP
====
Linux Apache MariaDB PHP
* PHP 7.4

Usage
-----
edit `docker-compose.yaml`. Edit `_php/html/config.php` or replace `_php/html` with your code.

bring your instance up:

```$ docker-compose up -d```

Visit: http://localhost/

take your instance down:

```$ docker-compose down```

Considerations
----
1. https://icon-icons.com/ for our favicon.ico
1. https://github.com/mlocati/docker-php-extension-installer for making it easy to install php extensions