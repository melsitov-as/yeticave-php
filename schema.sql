CREATE DATABASE yeticave;
USE yeticave;

CREATE TABLE categories (
    id INT AUTO_INCREMENT,
    character_code VARCHAR(128) UNIQUE,
    name_category VARCHAR(128),
    PRIMARY KEY(id)
);

CREATE TABLE users (
  id INT AUTO_INCREMENT,
  date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL UNIQUE,
  user_name VARCHAR(128),
  user_password CHAR(255),
  contacts TEXT,
  lots_id INT,
  bets_id INT,
  PRIMARY KEY(id)
);

CREATE TABLE lots (
  id INT AUTO_INCREMENT,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  title VARCHAR(255),
  lot_description TEXT,
  img VARCHAR(255),
  start_price INT,
  date_finish DATE,
  step INT,
  user_id INT,
  winner_id INT,
  category_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (winner_id) REFERENCES users(id),
  FOREIGN KEY (category_id) REFERENCES categories(id),
  PRIMARY KEY(id)
);

CREATE TABLE bets (
  id INT AUTO_INCREMENT,
  date_bet TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price_bet INT,
  user_id INT,
  lot_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (lot_id) REFERENCES lots(id),
  PRIMARY KEY(id)
);