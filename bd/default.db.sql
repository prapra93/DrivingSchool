BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `vehicules` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`make`	TEXT,
	`model`	TEXT,
	`plate`	TEXT,
	`created`	TEXT,
	`modified`	TEXT,
	`user_id`	INTEGER,
	FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);
INSERT INTO `vehicules` VALUES (2,'Toyota','yaris','R78 H87','2017-10-01 04:34:22','2017-10-01 04:34:22',NULL);
INSERT INTO `vehicules` VALUES (3,'Nissan','Versa','T69 HG6','2017-10-01 04:35:56','2017-10-01 04:35:56',NULL);
INSERT INTO `vehicules` VALUES (4,'Honda','Fit','HF7 HUO','2017-10-01 04:36:24','2017-10-01 04:36:24',NULL);
INSERT INTO `vehicules` VALUES (5,'Hyundai','Accent','HG6 D45','2017-10-01 04:37:43','2017-10-01 04:37:43',NULL);
INSERT INTO `vehicules` VALUES (7,'Mazda','3 Hatchback','E77 897','2017-10-02 19:24:09','2017-10-02 19:24:09',NULL);
CREATE TABLE IF NOT EXISTS `users` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`first_name`	TEXT,
	`last_name`	TEXT,
	`email`	TEXT,
	`password`	TEXT,
	`role`	TEXT,
	`created`	TEXT,
	`modified`	TEXT
);
INSERT INTO `users` VALUES (1,'Benoit','Hart','benoit.hart@admin.com','$2y$10$F5gi0c.KSj.lu6S0leEAc.Yw/gC.pzt/Fw2shCjHyHchsNX2Q8kzm',NULL,'2017-10-01 04:32:25','2017-10-01 04:32:25');
INSERT INTO `users` VALUES (3,'Martin','Desgroseillers','staff1@staff.com','$2y$10$k2H6zRhkCK.lLOTy8SdNw.VMhHvLvAJIISGVZBDas.YQGAlQMydMC','employee','2017-10-02 21:08:51','2017-10-02 21:08:51');
INSERT INTO `users` VALUES (4,'Manokith','Savejvong','staff2@staff.com','$2y$10$EJvnsE4DUwrXMOXDq7DHR.ZkM58GPAWQUsdbPV7hRThxXIQhdUlCy','employee','2017-10-02 21:09:28','2017-10-02 21:09:28');
INSERT INTO `users` VALUES (5,'Benoit','Hart','admin@admin.com','$2y$10$5xgqSzSz.4OIDMAVbqMsp.L66/r6rZkq1.8UrVKe.3eOCYvMoWnEK','admin','2017-10-02 21:31:19','2017-10-02 21:31:19');
CREATE TABLE IF NOT EXISTS `lessons_vehicules` (
	`lesson_id`	INTEGER,
	`vehicule_id`	INTEGER,
	PRIMARY KEY(`lesson_id`,`vehicule_id`),
	FOREIGN KEY(`vehicule_id`) REFERENCES `vehicules`(`id`)
);
INSERT INTO `lessons_vehicules` VALUES (7,7);
INSERT INTO `lessons_vehicules` VALUES (10,7);
INSERT INTO `lessons_vehicules` VALUES (13,7);
INSERT INTO `lessons_vehicules` VALUES (16,2);
CREATE TABLE IF NOT EXISTS `lessons_files` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`lesson_id`	INTEGER,
	`file_id`	INTEGER
);
INSERT INTO `lessons_files` VALUES (1,7,1);
INSERT INTO `lessons_files` VALUES (2,8,2);
INSERT INTO `lessons_files` VALUES (5,10,2);
INSERT INTO `lessons_files` VALUES (6,13,2);
INSERT INTO `lessons_files` VALUES (8,15,3);
INSERT INTO `lessons_files` VALUES (9,16,1);
CREATE TABLE IF NOT EXISTS `lessons` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`user_id`	INTEGER,
	`title`	TEXT,
	`description`	TEXT,
	`price`	TEXT,
	`created`	TEXT,
	`modified`	TEXT,
	FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);
INSERT INTO `lessons` VALUES (13,5,'Driving practice','This lesson will teach you how to drice and practice a class 5 car','50$/lesson','2017-10-03 00:20:11','2017-10-03 00:20:57');
INSERT INTO `lessons` VALUES (15,3,'Road sign','This lesson will teach you about road sign and theur meaning','20$','2017-10-03 00:50:08','2017-10-03 01:03:02');
INSERT INTO `lessons` VALUES (16,4,'Slip road','This lesson will teach you how to control your car when slipping on ice during winter','75$','2017-10-03 03:01:20','2017-10-03 03:03:37');
CREATE TABLE IF NOT EXISTS `i18n` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`locale`	TEXT,
	`model`	TEXT,
	`foreign_key`	INTEGER,
	`field`	TEXT,
	`content`	TEXT
);
INSERT INTO `i18n` VALUES (1,'fr_CA','Lessons',13,'title','Cours de conduite pratique');
INSERT INTO `i18n` VALUES (2,'fr_CA','Lessons',13,'description','Ce cours vous permet d\apprendre a conduire un vehicule de classe 5 promenade');
INSERT INTO `i18n` VALUES (3,'fr_CA','Lessons',13,'price','50$/cours');
INSERT INTO `i18n` VALUES (4,'fr_CA','Lessons',15,'title','Panneau de circulation');
INSERT INTO `i18n` VALUES (5,'fr_CA','Lessons',15,'description','Ce cours vous apprend sur les panneaux de circulation et leur signification');
INSERT INTO `i18n` VALUES (6,'fr_CA','Lessons',15,'price','');
INSERT INTO `i18n` VALUES (7,'fr_CA','Lessons',16,'title','Dérapage hiver');
INSERT INTO `i18n` VALUES (8,'fr_CA','Lessons',16,'description','Ce cours permet de pratiquer et savoir comment contrôler un véhicule lors dérapage sur glace');
INSERT INTO `i18n` VALUES (9,'fr_CA','Lessons',16,'price','75$');
CREATE TABLE IF NOT EXISTS `files` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT,
	`path`	TEXT,
	`created`	TEXT,
	`modified`	TEXT,
	`status`	INTEGER,
	`user_id`	INTEGER
);
INSERT INTO `files` VALUES (1,'derapage.jpg','Files/','2017-10-02 22:36:05','2017-10-02 22:36:05',1,5);
INSERT INTO `files` VALUES (2,'driving.jpg','Files/','2017-10-02 22:36:42','2017-10-02 22:36:42',1,3);
INSERT INTO `files` VALUES (3,'roadsigns.jpg','Files/','2017-10-02 22:37:59','2017-10-02 22:37:59',1,4);
CREATE TABLE IF NOT EXISTS `customers` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`first_name`	TEXT,
	`last_name`	TEXT,
	`email`	TEXT,
	`phone`	TEXT,
	`created`	TEXT,
	`modified`	TEXT,
	`user_id`	INTEGER
);
INSERT INTO `customers` VALUES (21,'Pravith','Vongphachanh','pravithv@hotmail.com','514-893-8934','2017-09-29 00:40:11','2017-09-29 00:40:11',2);
INSERT INTO `customers` VALUES (22,'Remi','Graton','remig@hotmail.com','450-968-9875','2017-09-29 00:41:14','2017-09-29 00:41:14',2);
INSERT INTO `customers` VALUES (23,'Salim','Feghali','salim@hotmail.com','343-333-3333','2017-09-29 00:42:26','2017-09-29 00:42:26',3);
INSERT INTO `customers` VALUES (24,'Etienne','Audet Cobello','etienne@gmail.com','514-555-6666','2017-09-29 00:42:52','2017-09-29 00:42:52',3);
COMMIT;
