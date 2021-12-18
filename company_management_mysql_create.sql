CREATE TABLE `account` (
	`username` varchar(50) NOT NULL,
	`password` varchar(50),
	`priority` int(1) DEFAULT '2',
	PRIMARY KEY (`username`)
);

CREATE TABLE `employee` (
	`id` varchar(4) NOT NULL,
	`username` varchar(50),
	`fullname` varchar(50),
	`gender` int,
	`position` varchar(20),
	`department` varchar(20),
	`avatar` varchar(100),
	`day_off` int(2),
	PRIMARY KEY (`id`)
);

CREATE TABLE `department` (
	`name` varchar(20) NOT NULL,
	`description` TEXT,
	`room` int(2),
	PRIMARY KEY (`name`)
);

CREATE TABLE `task` (
	`id` int(5) NOT NULL AUTO_INCREMENT,
	`title` varchar(100),
	`description` TEXT,
	`status` int(1),
	`rate` int(1),
	`creator` varchar(4),
	`receiver` varchar(4),
	`created_date` DATE,
	`deadline` DATE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `absence` (
	`id` int(5) NOT NULL AUTO_INCREMENT,
	`employee` varchar(4),
	`created_date` DATE,
	`start_date` DATE,
	`end_date` DATE,
	`reason` TEXT,
	`status` int(1),
	`attachment` varchar(100),
	PRIMARY KEY (`id`)
);

CREATE TABLE `task_log` (
	`task_id` int(5) NOT NULL,
	`comment` varchar(100) NOT NULL,
	`attachment` varchar(100) NOT NULL,
	PRIMARY KEY (`task_id`,`comment`,`attachment`)
);

ALTER TABLE `employee` ADD CONSTRAINT `employee_fk0` FOREIGN KEY (`username`) REFERENCES `account`(`username`);

ALTER TABLE `employee` ADD CONSTRAINT `employee_fk1` FOREIGN KEY (`department`) REFERENCES `department`(`name`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk0` FOREIGN KEY (`creator`) REFERENCES `employee`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk1` FOREIGN KEY (`receiver`) REFERENCES `employee`(`id`);

ALTER TABLE `absence` ADD CONSTRAINT `absence_fk0` FOREIGN KEY (`employee`) REFERENCES `employee`(`id`);

ALTER TABLE `task_log` ADD CONSTRAINT `task_log_fk0` FOREIGN KEY (`task_id`) REFERENCES `task`(`id`);







