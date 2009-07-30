
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- clanek
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `clanek`;


CREATE TABLE `clanek`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`excerpt` TEXT,
	`body` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`user_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `clanek_FI_1` (`user_id`),
	CONSTRAINT `clanek_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- komentar
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `komentar`;


CREATE TABLE `komentar`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`clanek_id` INTEGER,
	`author` VARCHAR(255),
	`email` VARCHAR(255),
	`body` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `komentar_FI_1` (`clanek_id`),
	CONSTRAINT `komentar_FK_1`
		FOREIGN KEY (`clanek_id`)
		REFERENCES `clanek` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nickname` VARCHAR(255),
	`name` VARCHAR(255),
	`email` VARCHAR(255),
	`password` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
