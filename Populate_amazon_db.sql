CREATE TABLE product (
code INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
main_category VARCHAR(100),
sub_category VARCHAR(100),
image VARCHAR(500),
discount_price DECIMAL(12,2),
original_price DECIMAL(12,2)
);

CREATE TABLE member (
	code INT PRIMARY KEY,
	phone INT NOT NULL UNIQUE,
	name VARCHAR(20)
);

LOAD DATA LOCAL INFILE 'Amazon-Products.csv'
INTO TABLE product
CHARACTER SET utf8mb4
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(
  @idx,
  name,
  main_category,
  sub_category,
  image,
  @link,
  @ratings,
  @no_of_ratings,
  @discount_price,
  @original_price
)
SET
  discount_price =
    ROUND(REPLACE(@discount_price, ',', '') * 0.01088, 2),
  original_price =
    ROUND(REPLACE(@original_price, ',', '') * 0.01088, 2);