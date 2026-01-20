CREATE TABLE product (
	code INT PRIMARY KEY,
	name VARCHAR(30),
	price FLOAT,
	description TEXT,
	image MEDIUMBLOB,
	image_type VARCHAR(50)
);

CREATE TABLE member (
	code INT PRIMARY KEY,
	phone INT NOT NULL UNIQUE,
	name VARCHAR(20)
);