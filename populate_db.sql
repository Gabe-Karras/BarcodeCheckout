CREATE TABLE product (
	code INT PRIMARY KEY,
	name VARCHAR(30),
	price FLOAT,
	description TEXT,
	image BLOB
);

CREATE TABLE member (
	phone INT PRIMARY KEY,
	name VARCHAR(20)
);