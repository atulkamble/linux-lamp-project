# Linux Commands Reference

Quick reference for the Linux commands practiced in this project (see README.md for full context).

## File Management

```text
pwd, ls, ls -l, ls -la, cd, mkdir, mkdir -p, touch, cp, mv, rm, rm -rf, cat, less, head, tail, find, grep
```

## Users and Groups

```text
whoami, id, useradd, usermod -aG, passwd, groupadd, groups
```

## Permissions

```text
chmod, chown, chgrp
```

## System Information

```text
hostname, hostnamectl, uname -a, uptime, date, lscpu, free -h, df -h
```

## Packages

```text
dnf update -y, dnf search, dnf info, dnf install, rpm -qa, rpm -ql
```

## Services (systemd)

```text
systemctl start|stop|restart|reload|enable|disable <service>
systemctl status <service>
systemctl is-active|is-enabled <service>
journalctl -u <service>
```

## Networking

```text
ip addr, ip route, hostname -I, ping, curl, curl -I, ss -tulpn, nslookup, dig
```

## Processes

```text
ps -ef, top, pgrep, kill, pkill
```

## Storage and Compression

```text
df -h, du, lsblk, mount, tar -czf, gzip, gunzip
```

## Automation

```text
bash script.sh, crontab -e, crontab -l
```
