USE ges;

ALTER USER 'gesystem'@'%' IDENTIFIED WITH mysql_native_password BY 'gesystem';

CREATE TABLE IF NOT EXISTS `enterlog`
(
    id INTEGER AUTO_INCREMENT,
    date DATETIME NOT NULL,
    studentid VARCHAR(128) NOT NULL,
    enter INTEGER NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `user`
(
    studentid VARCHAR(128) NOT NULL,
    grade VARCHAR(128) NOT NULL,
    name VARCHAR(128) NOT NULL,
    mail VARCHAR(128) NOT NULL,
    inroom BOOLEAN not null default 0,
    PRIMARY KEY(studentid)
);
