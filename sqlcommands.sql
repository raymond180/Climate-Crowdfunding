-- BMGT406 Project #7: Cable Company Database
--
-- SQL commands that were executed on the BMGT406 MySQL server
--
-- @file sqlcommands.sql
-- @version 1.3
-- @since 2014-11-09



-- for localhost
-- use MySQL console or phpMyAdmin
-- user root
-- no password
-- must create a database 
/* Create a new database to test your code locally   */



-- For use on bmgt406.rhsmith.umd.edu:
-- https://bmgt406.rhsmith.umd.edu/phpMyAdmin

-- mysql: user=bmgt406_## --password=bmgt406_## bmgt406_##_db
-- a dabase account has been created for each user
-- user bmgt406_XX
-- password 
-- database bmgt406_XX_db

use bmgt406_XX_db;


-- Creates table user
create table users (firstname varchar(50), lastname varchar(50), 
email varchar(70) primary key, 
password varchar(25));

-- Inserts data into table user
insert into users values ("Rose", "Smith", "rose@notreal.com", "blarose");
insert into users values ("Tom", "Peterson", "tom@doesnotexist.com", "blatom");
insert into users values ("Laura", "Clark", "laura@isnotreal.com", "blalaura");
insert into users values ("Testudo", "Turtle", "testudo@umd.edu", "GoTerps!");
insert into users values ("Jeanine", "Moon", "jmoon@meow.com", "password");
insert into users values ("Angeline", "Birdman", "abirdman@heroes.com", "12345");

-- Create table events
create table events (eventID smallint primary key AUTO_INCREMENT, eventName varchar(50), eventDesc varchar(100),
eventPictureFileName varchar(100));
-- Insert data into Events
insert into events (eventName, eventDesc, eventPictureFileName) values ("BMGT406Case", "BMGT 406 Case presentation", NULL);
insert into events (eventName, eventDesc, eventPictureFileName) values ("BMGT406Project", "BMGT 406 Project presentation", NULL);
insert into events (eventName, eventDesc, eventPictureFileName) values ("BMGT406Demo", "BMGT 406 Demo presentation", NULL);
insert into events (eventName, eventDesc, eventPictureFileName) values ("BMGT406App", "BMGT 406 App presentation", NULL);
insert into events (eventName, eventDesc, eventPictureFileName) values ("BENTLEYS", "After class ...", "Bentleys.jpg"); 
insert into events (eventName, eventDesc, eventPictureFileName) values ("BMGT406Extra", "Extra credit for all BMGT406 students!",
"Terps.png");

-- Create table signups
create table signups (SID smallint primary key AUTO_INCREMENT, 
eventID smallint,
FOREIGN KEY (eventID) REFERENCES events(eventID),
email varchar(70),
FOREIGN KEY (email) REFERENCES users(email));

-- Insert into signups
insert into signups (eventID, email) values (2, "rose@notreal.com");
insert into signups (eventID, email) values (4, "rose@notreal.com");
insert into signups (eventID, email) values (6, "rose@notreal.com");
insert into signups (eventID, email) values (4, "tom@doesnotexist.com");

