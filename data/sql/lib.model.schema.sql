
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- report
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `report`;


CREATE TABLE `report`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`filename` VARCHAR(255)  NOT NULL,
	`exported` TINYINT(4),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- car
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `car`;


CREATE TABLE `car`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`spz` VARCHAR(255)  NOT NULL,
	`factory` VARCHAR(255)  NOT NULL,
	`type` VARCHAR(255)  NOT NULL,
	`year` VARCHAR(255)  NOT NULL,
	`assignment` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- region
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `region`;


CREATE TABLE `region`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
