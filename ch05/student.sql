CREATE TABLE `student` (
    `studentid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255)
);

CREATE TABLE `course` (
    `courseid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `coursecode` varchar(10),
    `name` varchar(255)
);

CREATE TABLE `studentcourse` (
	`studentid` INT(11),
	`courseid` INT(11),
	UNIQUE INDEX `idx_studentcourse_unique` (`studentid`, `courseid`),
	INDEX `fk_studentcourse_courseid` (`courseid`),
	INDEX `fk_studentcourse_studentid` (`studentid`),
	CONSTRAINT `fk_studentcourse_courseid` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`),
	CONSTRAINT `fk_studentcourse_studentid` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`)
);

INSERT INTO `student`(`name`) VALUES('Bob Smith'); -- studentid 1
INSERT INTO `student`(`name`) VALUES('John Doe'); -- studentid 2
INSERT INTO `student`(`name`) VALUES('Jane Baker'); -- studentid 3

INSERT INTO `course`(`coursecode`, `name`)
    VALUES('CS101', 'Intro to Computer Sciencce'); -- courseid 1
INSERT INTO `course`(`coursecode`, `name`)
    VALUES('HIST369', 'British History 1945-1990'); -- courseid 2
INSERT INTO `course`(`coursecode`, `name`)
    VALUES('BIO546', 'Advanced Genetics'); -- courseid 3

INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(1,1);
INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(1,2);
INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(1,3);
INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(2,1);
INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(2,3);
INSERT INTO `studentcourse`(`studentid`, `courseid`) VALUES(3,2);
