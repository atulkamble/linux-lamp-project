#!/bin/bash

echo "======================================"

echo " Enterprise Linux Application Health"

echo "======================================"

echo

echo "Hostname:"
hostname

echo

echo "Operating System:"
cat /etc/os-release | grep PRETTY_NAME

echo

echo "Apache Status:"

if systemctl is-active --quiet httpd
then
    echo "RUNNING"
else
    echo "DOWN"
fi

echo

echo "MariaDB Status:"

if systemctl is-active --quiet mariadb
then
    echo "RUNNING"
else
    echo "DOWN"
fi

echo

echo "HTTP Test:"

if curl -s http://localhost > /dev/null
then
    echo "Website Accessible"
else
    echo "Website Failed"
fi

echo

echo "Port 80:"

if ss -lnt | grep -q ':80'
then
    echo "LISTENING"
else
    echo "NOT LISTENING"
fi

echo

echo "Port 3306:"

if ss -lnt | grep -q ':3306'
then
    echo "LISTENING"
else
    echo "NOT LISTENING"
fi

echo

echo "Memory:"

free -h

echo

echo "Disk:"

df -h /

echo

echo "System Uptime:"

uptime

echo

echo "======================================"
