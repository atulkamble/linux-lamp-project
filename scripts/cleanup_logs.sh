#!/bin/bash
# Truncates Apache access/error logs older than 7 days to free disk space.

LOG_DIRS=(
    "/var/log/httpd"
    "/var/log/mariadb"
)

DAYS_OLD=7

for dir in "${LOG_DIRS[@]}"
do
    if [ -d "$dir" ]
    then
        find "$dir" -type f -name "*.log" -mtime +$DAYS_OLD -exec truncate -s 0 {} \;
        echo "Cleaned logs older than $DAYS_OLD days in $dir"
    else
        echo "$dir not found, skipping."
    fi
done
