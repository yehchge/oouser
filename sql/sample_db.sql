CREATE DATABASE IF NOT EXISTS sample_db;
USE sample_db;

CREATE TABLE entities (
	entityid int(11) AUTO_INCREMENT PRIMARY KEY,
	name1 varchar(100) not null,
	name2 varchar(100) not null,
	type char(1) not null
);
INSERT INTO `entities` (`entityid`, `name1`, `name2`, `type`) VALUES
	(1, 'Baz Corp.', '', 'O'),
	(2, 'Bob Smith', '', 'I');

CREATE TABLE entityaddress (
	addressid int(11) AUTO_INCREMENT PRIMARY KEY,
	entityid int(11),
	saddress1 varchar(255),
	saddress2 varchar(255),
	scity varchar(255),
	cstate char(2),
	spostalcode varchar(10),
	stype varchar(50)
);
INSERT INTO `entityaddress` (`addressid`, `entityid`, `saddress1`, `saddress2`, `scity`, `cstate`, `spostalcode`, `stype`) VALUES
	(1, 2, '123 Main St.', NULL, 'Footown', 'PA', '12345-3134', NULL),
	(2, 2, '123 Elm St.', 'Suite 456', 'Footown', 'PA', '12345-2718', NULL);

CREATE TABLE entityemail (
	emailid int(11) AUTO_INCREMENT PRIMARY KEY,
	entityid int(11),
	semail varchar(255),
	stype varchar(50)
);
INSERT INTO `entityemail` (`emailid`, `entityid`, `semail`, `stype`) VALUES
	(1, 2, 'bob@bazcorp.com', NULL);

CREATE TABLE entityemployee (
	individualid int(11) not null,
	organizationid int(11) not null
);

CREATE TABLE entityphone (
	phoneid int(11) AUTO_INCREMENT PRIMARY KEY,
	entityid int(11),
	snumber varchar(20),
	sextension varchar(20),
	stype varchar(50)
);
INSERT INTO `entityphone` (`phoneid`, `entityid`, `snumber`, `sextension`, `stype`) VALUES
	(1, 1, '(314)159-2653', NULL, NULL),
	(2, 2, '(271)828-1828', '459', NULL);
