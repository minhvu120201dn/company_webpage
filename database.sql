-- Database name: company

CREATE TABLE users(
    first_name VARCHAR(20) NOT NULL,
    middle_name VARCHAR(20) NULL,
    last_name VARCHAR(20) NOT NULL,
    is_admin BOOLEAN NOT NULL,
    email VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    category VARCHAR(20) NOT NULL,
    brand VARCHAR(20) NOT NULL,
    img VARCHAR(50) NULL,
    description TEXT NULL,
    price DECIMAL NOT NULL,
    quantity INT NOT NULL
);

-- create an admin account
INSERT INTO users(first_name, middle_name, last_name, is_admin, email, password)
VALUES ("admin", NULL, "admin", 1, "admin@gmail.com", "$2y$10$KLtXZh56xl2ao9yeQz37iOdZ2ZoWz27H14Np2vozP2QfkMrojkPiS");
-- admin password: 123456