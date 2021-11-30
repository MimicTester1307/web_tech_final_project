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
                            `employee_email` VARCHAR(50) NOT NULL CHECK(employee_email LIKE '%@%'),
                            `employee_department` INTEGER NOT NULL,

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
                                     `employee_id` INTEGER, -- CHECK(employee_id NOT IN (SELECT Employee.employee_id FROM Employee WHERE Employee.employee_department = 6 OR 7)), -- A system maintainer cannot be someone in marketing or management department
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

                            PRIMARY KEY (`product_id`)
);

-- Patent table
CREATE TABLE `Patents` (
                           `patent_number` INTEGER,
                           `patent_description` VARCHAR(100) NOT NULL,
                           `patent_type` VARCHAR(10),

                           PRIMARY KEY (`patent_number`)
);

-- Event table
CREATE TABLE `Events` (
                          `event_id` INTEGER AUTO_INCREMENT,
                          `event_name` VARCHAR(75) NOT NULL,
                          `event_date` DATETIME NOT NULL ,
                          `event_speakers` VARCHAR(100) NOT NULL,

                          PRIMARY KEY (event_id)
);

-- Patent_Inventor Table
CREATE TABLE `Patent_Inventor` (
                                   `patent_number` INTEGER NOT NULL,
                                   `employee_id` INTEGER NOT NULL,

                                   FOREIGN KEY (patent_number) REFERENCES Patents(patent_number),
                                   FOREIGN KEY (employee_id) REFERENCES Employee(employee_id) ON DELETE CASCADE
);


-- Event_Registration TABLE
CREATE TABLE `Event_Registration` (
    `event_id` INTEGER NOT NULL,
    `participant_first_name` VARCHAR(50) NOT NULL,
    `participant_last_name` VARCHAR(50) NOT NULL,

    FOREIGN KEY (event_id) REFERENCES Events(event_id) ON DELETE CASCADE
);


-- Contact_Us TABLE
CREATE TABLE `Contact_Us` {
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `industry` VARCHAR(20) NOT NULL,
    `country` VARCHAR(50) NOT NULL,
    `message` VARCHAR(200) NOT NULL
}
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
INSERT INTO Employee (first_name, last_name, employee_email, employee_department)
VALUES ('Ryan', 'Thibodeaux', 'ryantdeaux@starlab.io', 3),
       ('Adam', 'Schwalm', 'adamschalm@starlab.io', 2),
       ('Christopher', 'Clark', 'chrislark@starlab.io', 1),
       ('Adam', 'Fraser', 'afraser@starlab.io', 7),
       ('Michael', 'Mehlberg', 'mmehlberg@starlab.io', 6),
       ('Michael', 'Ring', 'michaelring@starlab.io', 6),
       ('Cyra', 'Richardson', 'cyrarichardson@starlab.io', 7),
       ('Irby', 'Thompson', 'irbythompson@windriver.com', 4),
       ('Jonathan', 'Kline', 'jkline@windriver.com', 2),
       ('Jon', 'Tourville', 'jontville@starlab.io', 2),
       ('Shaun', 'Ruffell', 'shaunruffell@starlab.io', 1),
       ('David', 'Esler', 'davidesler@starlab.io', 1),
       ('Will', 'Abele', 'willabelle@starlab.io', 2),
       ('David', 'Reiter', 'dreiter@windriver.com', 3),
       ('Arlen', 'Baker', 'arlenbaker@windriver.com', 3),
       ('Jeff', 'C', 'jeffc@windriver.com', 5),
       ('Ray', 'Petty', 'ray.petty@starlab.io', 7),
       ('Jose Alejandro', 'Paiz Leonardo', 'japleonardo@starlab.io', 5),
       ('Kenneth', 'Jonsson', 'kjonsson@starlab.io', 5),
       ('Markus', 'Carlstedt', 'mcarlstedt@windriver.com', 5),
       ('Ionut', 'Popa', 'ionut.popa@windriver.com', 2),
       ('Raymond', 'Richardson', 'rrichardson@starlab.io', 2),
       ('Mark', 'Dopaz', 'mark.dopaz@starlab.io', 2),
       ('Arlen', 'Baker', 'arlenbaker@windriver.com', 5),
       ('Surya', 'Satyavolu', 'suryasatya@windriver.com', 4),
       ('Thierry', 'Preyssler', 'tpreyssler@windriver.com', 4),
       ('Mati', 'Sauks', 'msauks@starlab.io', 2);

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


-- Patents Table
INSERT INTO Patents
VALUES (10929201, 'Method and system for implementing generation locks', 'Grant'),
       (10887078, 'Device, system, and method for determining a forwading delay through a network device', 'Grant'),
       (10728420, 'Lossy compression for images and signals by identifying regions with low density features', 'Grant'),
       (10678744, 'Method and system for lockless interprocessor communication', 'Grant'),
       (10459722, 'Device, system, and method for secure supervisor system calls', 'Grant'),
       (10438005, 'Device, system, and method for protecting cryptographic keying material', 'Grant'),
       (10152331, 'Method and sytem for enforcing kernel mode access protection', 'Grant'),
       (10055155, 'Secure system on chip', 'Grant');

-- System_Maintainer
INSERT INTO System_Maintainer
VALUES (1, 1, 'available', 'all system checks passed'),
       (2, 2, 'available', 'routine maintainance-temporarily unavailable'),
       (3, 8, 'available', 'legacy system, migration complete'),
       (4, 11, 'available', 'all system checks passed'),
       (5, 18, 'available', 'all system checks passed');

-- Products
INSERT INTO Products(product_name, product_category, product_version, product_description)
VALUES ('Titanium Secure Hypervisor', 'Embedded Systems', '3.5', 'Offers secure, open-source virtualization for embedded systems'),
       ('Titanium Linux', 'Cyber Security', '1.02', 'The most robust Linux system-hardening and security capabilities'),
       ('Titanium Secure Boot', 'Operating Systems', '5.0', 'The strongest, most flexible boot-time authentication and trust for Linux on Intel chipsets'),
       ('Wind River Diab Compiler', 'Embedded Systems', '2.1', 'Produce high-quality, standards-compliant object code for embedded systems'),
       ('VxWorks', 'Operating Systems', '10.1', 'The Leading RTOS for the Intelligent Edge'),
       ('Crucible Embedded Virtualization Software', 'Operating Systems', '8.0', 'Maintain secure, high-quality guest environments');

-- Patent_Inventor 19 - 27
INSERT INTO Patent_Inventor
VALUES (10929201, 19),
       (10929201, 20),
       (10887078, 20),
       (10887078, 19),
       (10728420, 21),
       (10678744, 22),
       (10678744, 23),
       (10459722, 23),
       (10438005, 24),
       (10152331, 25),
       (10152331, 26),
       (10055155, 27);


-- Queries
-- Functionality 1
-- GROUP BY won't work because under the hood, enums are treated as integers
SELECT Products.product_category, Products.product_name, Products.product_description
FROM Products WHERE Products.product_category IN ('Operating Systems', 'Embedded Systems')
ORDER BY Products.product_category;

-- Functionality 2
-- Mention the fact that there are events with dates in 2020 inserted, and events in 2021 before the 5th month
SELECT Events.event_name, Events.event_speakers, Events.event_date
FROM Events WHERE Events.event_date >= '2021-05-01 00:00:00'
ORDER BY Events.event_date;


-- Functionality 3
-- Mention that if you check back, you'll see that this is the exact number of employees in each department. So the company has to employ more experts in anti-tamper technology, applied cryptography, and other departments with less than 4 employees
SELECT Department.dept_name, COUNT(Employee.employee_department) AS number_of_employees
FROM Department
         INNER JOIN Employee
                    ON Department.dept_id = Employee.employee_department
GROUP BY Employee.employee_department;

-- Functionality 4
SELECT Systems.system_id, Systems.system_status, Systems.date_of_last_check, System_Maintainer.maintainer_comments, Employee.first_name, Employee.last_name, System_Maintainer.maintainer_availability
FROM Systems
         INNER JOIN System_Maintainer
                    ON Systems.system_id = System_Maintainer.system_id
         INNER JOIN Employee
                    ON System_Maintainer.employee_id = Employee.employee_id
WHERE System_Maintainer.maintainer_availability = 'available';

-- Functionality 5
SELECT Employee.first_name, Employee.last_name, COUNT(Patents.patent_number) AS Number_of_Patents
FROM Patents
         INNER JOIN Patent_Inventor
                    ON Patents.patent_number = Patent_Inventor.patent_number
         INNER JOIN Employee
                    ON Employee.employee_id = Patent_Inventor.employee_id
GROUP BY Employee.employee_id;


-- Functionality 6: Updating the System Status of a System (systems 3 and 2)
UPDATE Systems
SET system_status = 'online', date_of_last_check = (SELECT CURRENT_TIMESTAMP)
WHERE system_id = 2 AND system_id = 3;

-- Functionality 7: Removing an employee from the employee table when the employee leaves the company
DELETE FROM Employee WHERE employee_id = 13;    # safe due to ON DELETE CASCADE