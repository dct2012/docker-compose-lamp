Docker Compose LAMP
====
Linux Apache MariaDB PHP7.4

Usage
-----
1. Edit `docker-compose.yaml`. Edit `_php/html/config.php` or replace `_php/html` with your code.

1. Bring your instance up: \
```$ docker-compose up -d```

1. Visit: http://localhost/

1. Take your instance down: \
```$ docker-compose down```

Considerations
----
1. https://icon-icons.com/ for our favicon.ico
1. https://github.com/mlocati/docker-php-extension-installer for making it easy to install php extensions