#!/bin/bash
# Installs and enables the Apache/PHP/MariaDB stack described in README.md.

set -e

sudo dnf update -y

sudo dnf install httpd -y
sudo systemctl enable --now httpd

sudo dnf install php php-fpm php-mysqli php-json -y
sudo systemctl restart httpd

sudo dnf install mariadb105-server -y
sudo systemctl enable --now mariadb

echo "LAMP stack installed. Run 'sudo mysql_secure_installation' next."
