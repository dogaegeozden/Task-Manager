CREATE DATABASE taskmanager;
USE taskmanager;

CREATE TABLE task (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description LONGTEXT,
    updatedAt DATE,
    completedAt DATE,
    PRIMARY KEY (id)
);

CREATE USER 'taskmanageradmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON taskmanager.* TO 'taskmanageradmin'@'localhost';