// project

server >> ec2 >>

1. launch and connect ec2

name: server
type: t3.medium OR c7.iflex.large
key.pem
SG - ssh-20, http-80, https-443, mysql-3306
SSD - 50GB

cd Downloads
chmod 400 "key.pem"
ssh -i "key.pem" ec2-user@ec2-54-167-218-166.compute-1.amazonaws.com

2.

sudo yum update -y
sudo yum upgrade -y
sudo -i passwd

3. system info

whoami
hostname
uname
uname -a
cat /etc/os-release
id
pwd
date
uptime
arch
lscpu
free -h
df -h

4. create user webadmin & set password - webadmin

sudo useradd webadmin
sudo passwd webadmin
id webadmin
groups webadmin
cat /etc/passwd
cat /etc/group

5. Install and run service - apache server

sudo dnf install httpd
sudo systemctl enable httpd
sudo systemctl start httpd
sudo systemctl status httpd

http://54.167.218.166/

curl http://54.167.218.166/

6. Install php

sudo dnf install php php-fpm php-mysqli php-json -y

php --version

7. check php

cd /var/www/html/
sudo touch info.php
sudo nano info.php

<?php phpinfo();?>

cat info.php

http://54.167.218.166/info.php

8. Install mariadb/mysql

sudo dnf install mariadb105-server -y
sudo systemctl start mariadb
sudo systemctl enable mariadb
sudo systemctl status mariadb
mysql --version

9. check ports

ss -tulpn

10. login to mysql

sudo mysql

SHOW DATABASES;
CREATE DATABASE student_portal;
SHOW DATABASES;

USE student_portal;


10. test database connectivity

cd /var/www/html
sudo touch db-test.php
sudo nano deb-test.php

<?php

$conn = new mysqli(
    "localhost",
    "webapp",
    "Student@12345",
    "student_portal"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Database connection successful!";

?>

http://54.167.218.166/db-test.php
