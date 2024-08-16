USE tien;
CREATE TABLE IF NOT EXISTS Employee(
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(50),
    dept_id INT,
    age INT,
    sex VARCHAR(6)
);

CREATE TABLE IF NOT EXISTS Department(
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
);

ALTER TABLE Employee
ADD FOREIGN KEY IF NOT EXISTS (dept_id) REFERENCES Department(id);