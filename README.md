# phpdocuments
Documentation system using pure PHP

CREATE TABLE `documents`.`sign` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'signature';

INSERT INTO `sign` (`id`, `name`) VALUES (NULL, 'ພົຈວ ບຸນແຍງ ວິໄລສົມ'), (NULL, 'ພັອ ໝອນແກ້ວ ຄຳອ້ວນ')

CREATE TABLE `documents`.`departments` ( `id` INT NOT NULL AUTO_INCREMENT , `department` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'departments name';

INSERT INTO `departments` (`id`, `department`) VALUES (NULL, 'ຫ້ອງວ່າການກະຊວງ'), (NULL, 'ກົມໃຫຍ່ການເມືອງ'), (NULL, 'ກົມໃຫຍ່ເສນາ'), (NULL, 'ກົມໃຫຍ່ພະລາ'), (NULL, 'ກົມໃຫຍ່ເຕັກນິກ')

CREATE TABLE `documents`.`documents` ( `id` INT NOT NULL AUTO_INCREMENT , `noin` VARCHAR(10) NULL , `datein` DATE NULL , `noout` VARCHAR(10) NULL , `dateout` DATE NULL ,`department` INT NULL , `detail` TEXT NULL , `status` VARCHAR(100) NULL DEFAULT 'ລໍຖ້າ' , `sign` VARCHAR(100) NULL , `takendate` DATE NULL , `taker` VARCHAR(100) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'documents database';

INSERT INTO `documents` (`id`, `noin`, `datein`, `noout`, `dateout`, `department`, `detail`, `status`, `sign`, `takendate`, `taker`) VALUES (NULL, '1234', '2021-07-15', '4321', '2021-07-09', '2', 'ທົດສອບຖານຂໍ້ມູນ', 'ລໍຖ້າ', NULL, NULL, NULL), (NULL, '1235', '2021-07-15', '5321', '2021-07-10', '3', 'ທົດສອບເຣັກຄອດທີ່ 2', 'ລໍຖ້າ', NULL, NULL, NULL)