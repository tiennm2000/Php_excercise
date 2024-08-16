USE tien;

CREATE TABLE IF NOT EXISTS employees(
    id INT(3) NOT NULL,
    name VARCHAR(40) NOT NULL,
    position VARCHAR(40) NOT NULL,
    salary BIGINT(10) NOT NULL
);