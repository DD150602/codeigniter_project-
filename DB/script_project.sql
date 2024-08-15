DROP DATABASE IF EXISTS codeigniter_project;

CREATE DATABASE codeigniter_project;

USE codeigniter_project;

CREATE TABLE roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_lastname VARCHAR(50) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_username VARCHAR(50) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    user_state BOOLEAN DEFAULT TRUE,
    user_annotation TEXT,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles (role_id)
);

CREATE TABLE projects (
    project_id INT PRIMARY KEY AUTO_INCREMENT,
    project_name VARCHAR(100) NOT NULL,
    project_description TEXT,
    project_completed BOOLEAN DEFAULT FALSE,
    project_init_date DATE DEFAULT(CURDATE()),
    project_finish_date DATE,
    project_state BOOLEAN DEFAULT TRUE,
    project_annotation TEXT
);

CREATE TABLE tasks (
    task_id INT PRIMARY KEY AUTO_INCREMENT,
    task_name VARCHAR(100) NOT NULL,
    task_description TEXT NOT NULL,
    task_completed BOOLEAN DEFAULT FALSE,
    task_state BOOLEAN DEFAULT TRUE,
    task_annotation TEXT,
    project_id INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects (project_id)
);

CREATE TABLE users_has_tasks (
    user_task_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    task_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (user_id),
    FOREIGN KEY (task_id) REFERENCES tasks (task_id)
);

CREATE TABLE users_has_projects (
    user_project_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (user_id),
    FOREIGN KEY (project_id) REFERENCES projects (project_id)
);

CREATE TABLE password_resets (
    ps_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ps_token VARCHAR(255) NOT NULL,
    ps_created_at DATETIME DEFAULT(CURDATE()) NOT NULL,
    ps_expired_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

INSERT INTO roles (role_name) VALUES 
('Administrator'),
('Project Manager'),
('Developer');