#!/bin/bash

echo "===== SYSTEM REPORT ====="

echo

echo "Date:"
date

echo

echo "Hostname:"
hostname

echo

echo "Kernel:"
uname -r

echo

echo "OS:"
cat /etc/os-release | grep PRETTY_NAME

echo

echo "Uptime:"
uptime

echo

echo "Memory:"
free -h

echo

echo "Disk:"
df -h

echo

echo "IP:"
hostname -I

echo

echo "Apache:"
systemctl is-active httpd

echo

echo "MariaDB:"
systemctl is-active mariadb

echo

echo "Listening Ports:"
ss -lnt

echo

echo "========================="
