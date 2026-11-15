CREATE DATABASE IF NOT EXISTS portfolio;
USE portfolio;

CREATE TABLE info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bio TEXT,
    email VARCHAR(100)
);

INSERT INTO info (bio, email) VALUES
('Software Engineering student at the University of Hail, CAPM certified by PMI, and a graduate of the McKinsey Forward Program. I combine technical foundations with project management and business analysis skills, Agile and Waterfall delivery, and digital transformation.',
 'Saud.Alshdayyid@gmail.com');

CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100)
);

INSERT INTO skills (skill_name) VALUES
('Java'),
('HTML & CSS'),
('JavaScript'),
('PHP & MySQL'),
('Agile & Waterfall'),
('Project Management'),
('Business Analysis'),
('Problem Solving'),
('Communication'),
('Teamwork');

CREATE TABLE experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(100),
    company VARCHAR(100),
    period VARCHAR(100),
    details TEXT
);

INSERT INTO experience (job_title, company, period, details) VALUES
('Product Manager', 'Qetaah', 'Aug 20, 2026 - Present',
 'Working as a Product Manager at Qetaah, a startup that offers a digital car repair service platform.'),
('IT Intern', 'Al Rabeh Real Estate Development (Al Jomaih Holding)', '2-Month Full-Time Internship',
 'Built a meeting room booking system, designed the UX for the custody system, and supported Oracle NetSuite ERP tasks.');

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT
);

INSERT INTO projects (title, description) VALUES
('Meeting Room Booking System', 'An internal system that lets staff book and manage meeting rooms.'),
('Custody System UX', 'Designed the user experience of a company custody system to make it easier to use.'),
('Portfolio Website', 'This website, built with HTML, CSS, JavaScript, PHP and MySQL.');

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
);
