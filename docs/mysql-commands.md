# MySQL / MariaDB Commands Reference

Quick reference for the database commands practiced in this project (see README.md for full context).

## Connect

```bash
sudo mysql
mysql -u root -p
mysql -u webapp -p student_portal
```

## Database and Table Setup

```sql
CREATE DATABASE student_portal;
SHOW DATABASES;
USE student_portal;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SHOW TABLES;
DESCRIBE students;
```

## Application User and Privileges

```sql
CREATE USER 'webapp'@'localhost' IDENTIFIED BY 'Student@12345';
GRANT SELECT, INSERT, UPDATE, DELETE ON student_portal.* TO 'webapp'@'localhost';
SHOW GRANTS FOR 'webapp'@'localhost';
FLUSH PRIVILEGES;
```

## CRUD Examples

```sql
SELECT * FROM students;
SELECT name, email FROM students WHERE city = 'Pune';
SELECT * FROM students ORDER BY name;
SELECT COUNT(*) FROM students;

INSERT INTO students (name, email, course, city)
VALUES ('Neha', 'neha@example.com', 'Azure', 'Pune');

UPDATE students SET course = 'Linux + DevOps' WHERE id = 1;

DELETE FROM students WHERE id = 1;
```

## Backup and Restore

```bash
mysqldump student_portal > student_portal_backup.sql
mysql student_portal < student_portal_backup.sql
```
