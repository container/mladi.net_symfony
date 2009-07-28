
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- blog_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_post`;


CREATE TABLE `blog_post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`excerpt` TEXT,
	`body` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- blog_comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_comment`;


CREATE TABLE `blog_comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`blog_post_id` INTEGER,
	`author` VARCHAR(255),
	`email` VARCHAR(255),
	`body` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `blog_comment_FI_1` (`blog_post_id`),
	CONSTRAINT `blog_comment_FK_1`
		FOREIGN KEY (`blog_post_id`)
		REFERENCES `blog_post` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vprasanje
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vprasanje`;


CREATE TABLE `vprasanje`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`naslov` VARCHAR(255),
	`text` VARCHAR(255),
	`nickname` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- odgovor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `odgovor`;


CREATE TABLE `odgovor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`vprasanje_id` INTEGER,
	`svetovalec_id` INTEGER,
	`naslov` VARCHAR(255),
	`text` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `odgovor_FI_1` (`vprasanje_id`),
	CONSTRAINT `odgovor_FK_1`
		FOREIGN KEY (`vprasanje_id`)
		REFERENCES `vprasanje` (`id`),
	INDEX `odgovor_FI_2` (`svetovalec_id`),
	CONSTRAINT `odgovor_FK_2`
		FOREIGN KEY (`svetovalec_id`)
		REFERENCES `svetovalec` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;


CREATE TABLE `category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`naslov` VARCHAR(255),
	`text` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- svetovalec
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `svetovalec`;


CREATE TABLE `svetovalec`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nickname` VARCHAR(255),
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vprasanje_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vprasanje_category`;


CREATE TABLE `vprasanje_category`
(
	`vprasanje` INTEGER  NOT NULL,
	`category` INTEGER  NOT NULL,
	PRIMARY KEY (`vprasanje`,`category`),
	CONSTRAINT `vprasanje_category_FK_1`
		FOREIGN KEY (`vprasanje`)
		REFERENCES `vprasanje` (`id`),
	INDEX `vprasanje_category_FI_2` (`category`),
	CONSTRAINT `vprasanje_category_FK_2`
		FOREIGN KEY (`category`)
		REFERENCES `category` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- svetovalec_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `svetovalec_category`;


CREATE TABLE `svetovalec_category`
(
	`svetovalec` INTEGER  NOT NULL,
	`category` INTEGER  NOT NULL,
	PRIMARY KEY (`svetovalec`,`category`),
	CONSTRAINT `svetovalec_category_FK_1`
		FOREIGN KEY (`svetovalec`)
		REFERENCES `svetovalec` (`id`),
	INDEX `svetovalec_category_FI_2` (`category`),
	CONSTRAINT `svetovalec_category_FK_2`
		FOREIGN KEY (`category`)
		REFERENCES `category` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tags
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;


CREATE TABLE `tags`
(
	`name` VARCHAR(255)  NOT NULL,
	`vprasanje_id` INTEGER  NOT NULL,
	PRIMARY KEY (`name`,`vprasanje_id`),
	INDEX `tags_FI_1` (`vprasanje_id`),
	CONSTRAINT `tags_FK_1`
		FOREIGN KEY (`vprasanje_id`)
		REFERENCES `vprasanje` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- notifications
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;


CREATE TABLE `notifications`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`odgovor_id` INTEGER,
	`email` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`,`email`),
	INDEX `notifications_FI_1` (`odgovor_id`),
	CONSTRAINT `notifications_FK_1`
		FOREIGN KEY (`odgovor_id`)
		REFERENCES `odgovor` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
