# Troubleshooting Guide

Common issues and fixes for this LAMP project (see README.md for full walkthroughs).

## Apache Won't Start / Website Doesn't Open

```bash
systemctl status httpd
sudo journalctl -u httpd --no-pager
sudo apachectl configtest
sudo ss -lntp | grep :80
```

## Port 80 Already In Use

```bash
sudo ss -lntp | grep :80
sudo kill <PID>
```

## Website Works but Database Doesn't

* Verify `website/db.php` credentials match the database user.
* Confirm MariaDB is running: `systemctl status mariadb`.
* Confirm the `webapp` user has privileges: `SHOW GRANTS FOR 'webapp'@'localhost';`.
* Check port 3306 is listening locally: `sudo ss -lntp | grep :3306`.

## Access Denied for User

```sql
SHOW GRANTS FOR 'webapp'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON student_portal.* TO 'webapp'@'localhost';
FLUSH PRIVILEGES;
```

## Connection Refused (MariaDB)

```bash
systemctl status mariadb
sudo systemctl restart mariadb
sudo ss -lntp | grep :3306
```

## Permission Denied Errors

```bash
sudo chown -R root:apache /var/www/html
sudo find /var/www/html -type d -exec chmod 755 {} \;
sudo find /var/www/html -type f -exec chmod 644 {} \;
```

## Apache Logs

```bash
sudo tail -f /var/log/httpd/access_log
sudo tail -f /var/log/httpd/error_log
```
