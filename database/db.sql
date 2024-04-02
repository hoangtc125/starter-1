CREATE SCHEMA IF NOT EXISTS starter_1;
USE starter_1;

CREATE TABLE account
(
    id              BIGINT       NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username        VARCHAR(50)  NOT NULL UNIQUE,
    email           VARCHAR(255) NOT NULL UNIQUE,
    first_name      VARCHAR(255) NOT NULL,
    last_name       VARCHAR(255) NOT NULL,
    hash_password   VARCHAR(255) NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

CREATE TABLE account_resource
(
    id          BIGINT       NOT NULL AUTO_INCREMENT PRIMARY KEY,
    account_id  BIGINT       NOT NULL,
    avatar      BLOB,
    FOREIGN KEY (account_id) REFERENCES account(id)
) ENGINE = InnoDB;
