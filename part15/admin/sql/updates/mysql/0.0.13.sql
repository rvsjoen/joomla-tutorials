-- $Id: install.mysql.utf8.sql 50 2010-11-21 20:47:46Z chdemko $

ALTER TABLE `#__helloworld` ADD `params` VARCHAR(1024) NOT NULL DEFAULT '';

