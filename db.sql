CREATE DATABASE event_registration;

USE event_registration;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    event_date DATE
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    event_id INT,
    FOREIGN KEY (event_id) REFERENCES events(id)
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

-- Insert default admin
INSERT INTO admins (username, password) VALUES ('admin', MD5('admin123'));
