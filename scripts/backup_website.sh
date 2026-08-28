#!/bin/bash

SOURCE="/var/www/html"

BACKUP_DIR="/opt/backups/website"

DATE=$(date +%Y-%m-%d_%H-%M-%S)

mkdir -p "$BACKUP_DIR"

tar -czf \
"$BACKUP_DIR/website_$DATE.tar.gz" \
"$SOURCE"

if [ $? -eq 0 ]
then
    echo "Website backup successful."
else
    echo "Website backup failed."
fi
