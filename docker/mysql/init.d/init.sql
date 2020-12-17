USE ges;

ALTER USER 'gesystem'@'%' IDENTIFIED WITH mysql_native_password BY 'gesystem';

CREATE TABLE IF NOT EXISTS `enterlog`
(
    id INTEGER AUTO_INCREMENT,
    date DATETIME NOT NULL,
    name VARCHAR(128) NOT NULL,
    studentid VARCHAR(128) NOT NULL,
    enter INTEGER NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `inroom`
(
    studentid VARCHAR(128) NOT NULL,
    date DATETIME NOT NULL,
    PRIMARY KEY(studentid)
);
