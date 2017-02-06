DROP DATABASE IF EXISTS `qh`;
CREATE database IF NOT EXISTS `qh` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `qh`;

CREATE TABLE `areas` (
  id_area INT(11) AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;









/* Связка таблицы "" с таблицей "" 
ALTER TABLE `answers` ADD CONSTRAINT question_answers FOREIGN KEY(`id_question`) REFERENCES `questions` (`id_question`) ON UPDATE CASCADE ON DELETE CASCADE;*/