CREATE TABLE Client(
    id int(6) AUTO_INCREMENT,
    username varchar(50) NOT NULL UNIQUE,
    email varchar(50) UNIQUE,
    phone varchar(15) UNIQUE,
    password varchar(50) NOT NULL,
    
    PRIMARY KEY(id)
);
INSERT into client(username, email, phone, password) VALUES('ankan', 'hekd@gmail.com', '++80 2938749', 'password');



CREATE TABLE Division (
    division_name varchar(50),
    PRIMARY KEY(division_name)
);
INSERT INTO Division VALUES ('Dhaka');
INSERT INTO District VALUES ('Narayangonj', 'Dhaka');
