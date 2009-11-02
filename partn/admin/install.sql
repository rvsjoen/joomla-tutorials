-- $Id$

DROP TABLE IF EXISTS `#__hello`;

CREATE TABLE `#__hello` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  `catid` int(11) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__hello` (`greeting`) VALUES
	('Hello, World!'),
	('Bonjour, Monde!'),
	('Ciao, Mondo!'),
	('Hola, Mundo!'),
	('Hallo, Welt!'),
	('Здравствуй, мир!');
	
INSERT INTO `#__categories` (
	`level`,
    `parent_id`,
	`extension` ,
	`language` ,
	`title` ,
	`alias` ,
	`description` ,
	`published` ,
	`access` ,
	`params`
) VALUES
('1', '1', 'com_hello', 'en-GB', 'Welcome', 'welcome', 'Welcome messages', '1', '1', '{}'),
('1', '1', 'com_hello', 'en-GB', 'Good bye', 'good-bye', 'Good bye messages', '1', '1', '{}');

