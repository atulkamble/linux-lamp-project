#!/bin/bash

DATABASE="student_portal"

BACKUP_DIR="/opt/backups/database"

DATE=$(date +%Y-%m-%d_%H-%M-%S)

mkdir -p "$BACKUP_DIR"

mysqldump "$DATABASE" \
> "$BACKUP_DIR/student_portal_$DATE.sql"

if [ $? -eq 0 ]
then
    echo "Database backup successful."
else
    echo "Database backup failed."
fi
