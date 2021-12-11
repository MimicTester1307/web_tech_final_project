-- Web Tech Final Assignment 2021
-- Excel Chukwu, 58282023

DROP DATABASE IF EXISTS `Star_Lab_58282023`;
CREATE DATABASE `Star_Lab_58282023`;
USE `Star_Lab_58282023`;


-- Department table
CREATE TABLE `Department` (
                              `dept_id` INTEGER AUTO_INCREMENT,
                              `dept_name` VARCHAR(50) NOT NULL,

                              PRIMARY KEY (`dept_id`)
);

-- Employee table
CREATE TABLE `Employee` (
                            `employee_id` INTEGER AUTO_INCREMENT,
                            `first_name` VARCHAR(50) NOT NULL,
                            `last_name` VARCHAR(50) NOT NULL,
                            `employee_email` VARCHAR(50) NOT NULL,
                            `employee_department` INTEGER NOT NULL,
                            `employee_password` VARCHAR(80) NOT NULL,

                            PRIMARY KEY (`employee_id`),
                            FOREIGN KEY (employee_department) REFERENCES Department(dept_id)
);

-- System table
CREATE TABLE `Systems` (
                           `system_id` INTEGER AUTO_INCREMENT,
                           `system_status` ENUM ('online', 'offline', 'disabled') NOT NULL,
                           `date_of_last_check` DATETIME NOT NULL,

                           PRIMARY KEY (`system_id`)
);

-- System_Maintainer table
CREATE TABLE `System_Maintainer` (
                                     `system_id` INTEGER,
                                     `employee_id` INTEGER,
                                     `maintainer_availability` ENUM('available', 'unavailable'),
                                     `maintainer_comments` VARCHAR(75) NOT NULL,

                                     FOREIGN KEY (system_id) REFERENCES Systems(system_id) ON DELETE CASCADE,
                                     FOREIGN KEY (employee_id) REFERENCES Employee(employee_id) ON DELETE CASCADE
);

-- Product table
CREATE TABLE `Products` (
                            `product_id` INTEGER AUTO_INCREMENT,
                            `product_name` VARCHAR(50) NOT NULL,
                            `product_category` ENUM('Operating Systems', 'Embedded Systems', 'Cyber Security') NOT NULL,
                            `product_version` VARCHAR(5),
                            `product_description` VARCHAR(100),
                            `product_image` TEXT NOT NULL,

                            PRIMARY KEY (`product_id`)
);


-- Event table
CREATE TABLE `Events` (
                          `event_id` INTEGER AUTO_INCREMENT,
                          `event_name` VARCHAR(75) NOT NULL,
                          `event_date` DATETIME NOT NULL ,
                          `event_speakers` VARCHAR(100) NOT NULL,

                          PRIMARY KEY (event_id)
);


-- Event_Registration TABLE
CREATE TABLE `Event_Registration` (
    `event_id` INTEGER NOT NULL,
    `participant_first_name` VARCHAR(50) NOT NULL,
    `participant_last_name` VARCHAR(50) NOT NULL,
    `participant_email` VARCHAR(50) NOT NULL,

    FOREIGN KEY (event_id) REFERENCES Events(event_id) ON DELETE CASCADE
);


-- Contact_Us TABLE
CREATE TABLE `Contact_Us` (
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `industry` VARCHAR(20) NOT NULL,
    `country` VARCHAR(50) NOT NULL,
    `contact_message` VARCHAR(200) NOT NULL,
    `contact_file` MEDIUMBLOB
);
--
-- Index Creation
--
-- Index1: There will be a lot of joins on the employee table, so it appropriate
-- to create indexes on the two columns that will be displayed often
CREATE INDEX employee_index ON Employee (first_name, last_name);

-- Index2: Being a company with numerous product offerings clients will
-- search for the products often, so it is appropriate to speed up retrieval
-- by creating indexes on the product name and category
CREATE INDEX product_index ON Products (product_name, product_category);


--
-- Populating the Tables
--
-- Department Table
INSERT INTO Department (dept_name)
VALUES ('Software Engineering'),
       ('Embedded Development and Virtualization'),
       ('Cyber Protection'),
       ('Anti-Tamper Technology'),
       ('Applied Cryptography'),
       ('Marketing'),
       ('Management');

-- Employee Table
INSERT INTO Employee (first_name, last_name, employee_email, employee_department, employee_password)
VALUES ('Ryan', 'Thibodeaux', 'ryantdeaux@starlab.io', 3, 'Unlhbi5UaGlib2RlYXV4'),
       ('Adam', 'Schwalm', 'adamschalm@starlab.io', 2, 'QWRhbS5TY2h3YWxt'),
       ('Christopher', 'Clark', 'chrislark@starlab.io', 1, 'Q2hyaXN0b3BoZXIuQ2xhcms='),
       ('Adam', 'Fraser', 'afraser@starlab.io', 7, 'QWRhbS5GcmFzZXI='),
       ('Michael', 'Mehlberg', 'mmehlberg@starlab.io', 6, 'TWljaGFlbC5NZWhsYmVyZw=='),
       ('Michael', 'Ring', 'michaelring@starlab.io', 6, 'TWljaGFlbC5SaW5n'),
       ('Cyra', 'Richardson', 'cyrarichardson@starlab.io', 7, 'Q3lyYS5SaWNoYXJkc29u'),
       ('Irby', 'Thompson', 'irbythompson@windriver.com', 4, 'SXJieS5UaG9tcHNvbg=='),
       ('Jonathan', 'Kline', 'jkline@windriver.com', 2, 'Sm9uYXRoYW4uS2xpbmU='),
       ('Jon', 'Tourville', 'jontville@starlab.io', 2, 'Sm9uLlRvdXJ2aWxsZQ=='),
       ('Shaun', 'Ruffell', 'shaunruffell@starlab.io', 1, 'U2hhdW4uUnVmZmVsbA=='),
       ('David', 'Esler', 'davidesler@starlab.io', 1, 'RGF2aWQuRXNsZXI='),
       ('Will', 'Abele', 'willabelle@starlab.io', 2, 'V2lsbC5BYmVsZQ=='),
       ('David', 'Reiter', 'dreiter@windriver.com', 3, 'RGF2aWQuUmVpdGVy'),
       ('Arlen', 'Baker', 'arlenbaker@windriver.com', 3, 'QXJsZW4uQmFrZXI='),
       ('Jeff', 'C', 'jeffc@windriver.com', 5, 'SmVmZi5D'),
       ('Ray', 'Petty', 'ray.petty@starlab.io', 7, 'UmF5LlBldHR5'),
       ('Jose Alejandro', 'Paiz Leonardo', 'japleonardo@starlab.io', 5, 'Sm9zZSBBbGVqYW5kcm8uUGFpeiBMZW9uYXJkbw=='),
       ('Kenneth', 'Jonsson', 'kjonsson@starlab.io', 5, 'S2VubmV0aC5Kb25zc29u'),
       ('Markus', 'Carlstedt', 'mcarlstedt@windriver.com', 5, 'TWFya3VzLkNhcmxzdGVkdA=='),
       ('Ionut', 'Popa', 'ionut.popa@windriver.com', 2, 'SW9udXQuUG9wYQ=='),
       ('Raymond', 'Richardson', 'rrichardson@starlab.io', 2, 'UmF5bW9uZC5SaWNoYXJkc29u'),
       ('Mark', 'Dopaz', 'mark.dopaz@starlab.io', 2, 'TWFyay5Eb3Bheg=='),
       ('Surya', 'Satyavolu', 'suryasatya@windriver.com', 4, 'U3VyeWEuU2F0eWF2b2x1'),
       ('Thierry', 'Preyssler', 'tpreyssler@windriver.com', 4, 'VGhpZXJyeS5QcmV5c3NsZXI='),
       ('Mati', 'Sauks', 'msauks@starlab.io', 2, 'TWF0aS5TYXVrcw==');

-- Systems Table
INSERT INTO Systems (system_status, date_of_last_check)
VALUES ('online', '2021-05-04 11-51-56'),
       ('offline', '2021-05-01 08-34-48'),
       ('disabled', '2020-12-25 08-03-12'),
       ('online', '2021-05-04 11-03-12'),
       ('online', '2021-05-05 23-59-00');

-- Events Table
INSERT INTO Events(event_name, event_date, event_speakers)
VALUES ('Online Cybersecurity Expert Discussion', '2021-03-18 13:00:00', 'Matt Areno, Steve Edwards, Irby Thompson, Cal Biesecker'),
       ('Open Source, Military Systems and Cybersecurity', '2020-05-06 12:00:00', 'Glenn Seiler, Michael Mehlberg, Matt Jones, John Keller'),
       ('Clearing the Skies of Cybersecurity Vulnerabilities From the Ground Up', '2021-12-02 09:00:00', 'Michael Gale, Thomas Rosen, Nikhil Chauhan'),
       ('Embedded World 2021', '2021-03-05 08:00:00', 'Kevin Dallas, Paul Miller Jr., Matt Jones'),
       ('Wind River Security Summit', '2021-11-18 09:00:00', 'Window Snyder, David Bray, Eric Cole, Wendy Frank');


-- System_Maintainer
INSERT INTO System_Maintainer
VALUES (1, 1, 'available', 'all system checks passed'),
       (2, 2, 'available', 'routine maintainance-temporarily unavailable'),
       (3, 8, 'available', 'legacy system, migration complete'),
       (4, 11, 'available', 'all system checks passed'),
       (5, 18, 'available', 'all system checks passed');

-- Products
INSERT INTO Products(product_name, product_category, product_version, product_description, product_image)
VALUES ('Titanium Secure Hypervisor', 'Embedded Systems', '3.5', 'Offers secure, open-source virtualization for embedded systems', 'titanium_hypervisor.jpg'),
       ('Titanium Linux', 'Cyber Security', '1.02', 'The most robust Linux system-hardening and security capabilities', 'titanium_linux.jpg'),
       ('Titanium Secure Boot', 'Operating Systems', '5.0', 'The strongest, most flexible boot-time authentication and trust for Linux on Intel chipsets', 'titanium_secure_boot.jpg'),
       ('Wind River Diab Compiler', 'Embedded Systems', '2.1', 'Produce high-quality, standards-compliant object code for embedded systems', 'windriver-diab.png'),
       ('VxWorks', 'Operating Systems', '10.1', 'The Leading RTOS for the Intelligent Edge', 'windriver-helix.png'),
       ('Helix Virtualization Platform', 'Operating Systems', '8.0', 'Maintain secure, high-quality guest environments', 'windriver-vxworks.jpg');


-- -- Queries
-- -- Functionality 1
-- -- GROUP BY won't work because under the hood, enums are treated as integers
-- SELECT Products.product_category, Products.product_name, Products.product_description
-- FROM Products WHERE Products.product_category IN ('Operating Systems', 'Embedded Systems', 'Cyber Security')
-- ORDER BY Products.product_category;

-- -- Functionality 2
-- -- Mention the fact that there are events with dates in 2020 inserted, and events in 2021 before the 5th month
-- SELECT Events.event_name, Events.event_speakers, Events.event_date
-- FROM Events WHERE Events.event_date >= '2021-05-01 00:00:00'
-- ORDER BY Events.event_date;


-- -- Functionality 3
-- SELECT Systems.system_id, Systems.system_status, Systems.date_of_last_check, System_Maintainer.maintainer_comments, Employee.first_name, Employee.last_name, System_Maintainer.maintainer_availability
-- FROM Systems
--          INNER JOIN System_Maintainer
--                     ON Systems.system_id = System_Maintainer.system_id
--          INNER JOIN Employee
--                     ON System_Maintainer.employee_id = Employee.employee_id
-- WHERE System_Maintainer.maintainer_availability = 'available';



-- -- Functionality 4: Updating the System Status of a System (systems 3 and 2)
-- UPDATE Systems
-- SET system_status = 'online', date_of_last_check = (SELECT CURRENT_TIMESTAMP)
-- WHERE system_id = 2 AND system_id = 3;

-- -- Functionality 5: Removing an employee from the employee table when the employee leaves the company
-- DELETE FROM Employee WHERE employee_id = 13;    # safe due to ON DELETE CASCADE