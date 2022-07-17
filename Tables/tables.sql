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

CREATE TABLE District(
    district_name varchar(50) NOT NULL UNIQUE,
    division_name varchar(50) NOT NULL,
    CONSTRAINT location PRIMARY KEY(district_name, division_name),
    FOREIGN KEY(division_name) REFERENCES Division (division_name) ON DELETE CASCADE
);
INSERT INTO District VALUES ('Narayangonj', 'Dhaka');


CREATE TABLE Services(
    id int(6) AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    phone varchar(50) NOT NULL UNIQUE,
    email varchar(100) NOT NUll UNIQUE,
    type varchar(50) CHECK (type in ('doctor', 'Doctor', 'hospital', 'Hospital', 'ambulance', 'Ambulance', 'blood_bank', 'Blood_Bank', 'pharmacy', 'Pharmacy')),
    location varchar(100) NOT NULL,
    district_name varchar(50) NOT NULL,
    division_name varchar(50) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(district_name, division_name) REFERENCES District (district_name, division_name) ON DELETE CASCADE
);
INSERT INTO Services(name, phone, email, type, location, district_name, division_name) VALUES ('Dr. Osim', '013325', 'example1@gmai.com', 'Doctor', 'google map loction', 'Taligati', 'Khulna');


CREATE TABLE `medi_sol`.`articles` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `title` VARCHAR(200) NOT NULL ,
    `description` VARCHAR(1000) NOT NULL ,
    `image_url` TEXT NOT NULL ,
    PRIMARY KEY (`id`)
);
INSERT INTO articles(title, description, image_url) values ( 'new Article', 'abcd', 'IMG-62ceae0c9a6d70.87587964.jpg')

CREATE TABLE charity(
    TRANSACTION_id varchar(100),
    amount INT,
    PRIMARY KEY(TRANSACTION_id)
);