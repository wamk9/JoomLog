/* TABLES */
DROP TABLE IF EXISTS `#__joomlog_log`;
DROP TABLE IF EXISTS `#__joomlog_version`;
DROP TABLE IF EXISTS `#__joomlog_type`;

CREATE TABLE `#__joomlog_version` (
	`id`          INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`createdDate` DATE        NOT NULL,
	`version`     VARCHAR(10) NOT NULL,
	`published`   tinyint(4)  NOT NULL DEFAULT '1'
)
	ENGINE=InnoDB
	DEFAULT CHARSET=utf8mb4 
	DEFAULT COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `#__joomlog_type` (
	`id`          INT           NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title`       VARCHAR(100)  NOT NULL,
	`description` VARCHAR (255) NOT NULL,
	`published`   tinyint(4)    NOT NULL DEFAULT '1'
)
	ENGINE=InnoDB
	DEFAULT CHARSET=utf8mb4 
	DEFAULT COLLATE=utf8mb4_unicode_ci; 

CREATE TABLE `#__joomlog_log` (
	`id`          INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title`       VARCHAR(100) NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	`published`   tinyint(4)   NOT NULL DEFAULT '1',
	`fk_joomlog_version_id` INT NOT NULL,
	`fk_joomlog_type_id` INT NOT NULL,
	FOREIGN KEY (`fk_joomlog_version_id`) REFERENCES `#__joomlog_version` (`id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (`fk_joomlog_version_id`) REFERENCES `#__joomlog_version` (`id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
	ENGINE=InnoDB
	DEFAULT CHARSET=utf8mb4 
	DEFAULT COLLATE=utf8mb4_unicode_ci; 
/* ./TABLES */


/* default inserted */
INSERT INTO `#__joomlog_type` (`id`, `title`, `description`) VALUES
(1, 'ADDED', 'N/A'),
(2, 'CHANGED', 'N/A'),
(3, 'FIXED', 'N/A'),
(4, 'REMOVED', 'N/A'),
(5, 'SECURITY', 'N/A');


INSERT INTO `#__joomlog_version` (`id`, `createdDate`, `version`) VALUES
(1, CURDATE(), '1.0');

INSERT INTO `#__joomlog_log` (`id`, `title`, `description`, `fk_joomlog_version_id`, `fk_joomlog_type_id`) VALUES
(1, 'Joomlog Installed', 'To see more about this component visit <a href="https://github.com/wamk9/joomlog">github.com/wamk9/joomlog</a>.', 1, 1);