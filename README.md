# phpdocuments
Documentation system using pure PHP, AJAX, Bootstrap, DataTables, ChartJS
ລະບົບບັນທຶກ ຂາເຂົ້າ-ຂາອອກ ໃຊ້ໃນຫ້ອງການ ອົງກອນຕ່າງໆ
## Pages
    - index.php
    - report.php

-- Create database
CREATE DATABASE documents;

-- Use database
USE documents;

-- Create table
CREATE TABLE `documents`.`documents` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `noin` VARCHAR(10) NULL , 
    `datein` DATE NULL , 
    `noout` VARCHAR(10) NULL , 
    `dateout` DATE NULL ,
    `department` VARCHAR(10) NULL , 
    `detail` TEXT NULL , 
    `status` VARCHAR(100) NULL DEFAULT 'ລໍຖ້າ' , 
    `sign` VARCHAR(100) NULL , 
    `takendate` DATE NULL , 
    `taker` VARCHAR(100) NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'Document System Database';

-- Insert record(s)
INSERT INTO `documents` (`id`, `noin`, `datein`, `noout`, `dateout`, `department`, `detail`, `status`, `sign`, `takendate`, `taker`) VALUES
(NULL, '199-2020', '2020-05-19', '123', '2021-07-16', 'ກົມກະສິກຳ ກະຊວງກະສິກຳ ແລະ ປ່າໄມ້', 'ແຈ້ງງົບປະມານປະຈຳປີ', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '1-2021', '2021-01-1', '1', '2021-01-1', 'a', 'a', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '2-2021', '2021-02-2', '2', '2021-02-2', 'b', 'b', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '3-2021', '2021-03-3', '3', '2021-03-3', 'c', 'c', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '4-2021', '2021-04-4', '4', '2021-04-4', 'd', 'd', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '5-2021', '2021-05-5', '5', '2021-05-5', 'e', 'e', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '6-2021', '2021-06-6', '6', '2021-06-6', 'f', 'f', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '7-2021', '2021-07-7', '7', '2021-07-7', 'g', 'g', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '8-2021', '2021-08-8', '8', '2021-08-8', 'h', 'h', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '9-2021', '2021-09-9', '9', '2021-09-9', 'i', 'i', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '10-2021', '2021-10-10', '10', '2021-10-10', 'j', 'j', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '11-2021', '2021-11-11', '11', '2021-11-11', 'k', 'k', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '12-2021', '2021-12-12', '12', '2021-12-12', 'l', 'l', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '13-2021', '2021-01-13', '13', '2021-01-13', 'm', 'm', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '14-2021', '2021-02-14', '14', '2021-02-14', 'n', 'n', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '15-2021', '2021-03-15', '15', '2021-03-15', 'o', 'o', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '16-2021', '2021-04-16', '16', '2021-04-16', 'p', 'p', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '17-2021', '2021-05-17', '17', '2021-05-17', 'q', 'q', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '18-2021', '2021-06-18', '18', '2021-06-18', 'r', 'r', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '19-2021', '2021-07-19', '19', '2021-07-19', 's', 's', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '20-2021', '2021-08-20', '20', '2021-08-20', 't', 't', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '21-2021', '2021-09-21', '21', '2021-09-21', 'u', 'u', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '22-2021', '2021-10-22', '22', '2021-10-22', 'v', 'v', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '23-2021', '2021-11-23', '23', '2021-11-23', 'w', 'w', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '24-2021', '2021-12-24', '24', '2021-12-24', 'x', 'x', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '25-2021', '2021-01-25', '25', '2021-01-25', 'y', 'y', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '26-2021', '2021-02-26', '26', '2021-02-26', 'z', 'z', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '27-2021', '2021-03-27', '27', '2021-03-27', 'a', 'a', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '28-2021', '2021-04-28', '28', '2021-04-28', 'b', 'b', 'ລໍຖ້າ', NULL, NULL, NULL), 
(NULL, '29-2021', '2021-05-29', '29', '2021-05-29', 'c', 'c', 'ລໍຖ້າ', NULL, NULL, NULL)
