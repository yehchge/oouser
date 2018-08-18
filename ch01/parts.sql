CREATE DATABASE IF NOT EXISTS parts;
use parts;
CREATE TABLE IF NOT EXISTS widget (
    `widgetid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY(widgetid)
);
INSERT INTO widget (`name`, `description`)
 VALUES ('Foo', 'This is a footacular widget!');