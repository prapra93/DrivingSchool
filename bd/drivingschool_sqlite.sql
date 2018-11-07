CREATE TABLE users(
  `id` INTEGER PRIMARY KEY ASC,
  `first_name` text TEXT,
  `last_name` text TEXT,
  `email` text TEXT,
  `password` text TEXT,
  `role` text TEXT,
  `created` text TEXT,
  `modified` text TEXT
)

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Benoit', 'Hart', 'benoit.hart@admin.com', '$2y$10$F5gi0c.KSj.lu6S0leEAc.Yw/gC.pzt/Fw2shCjHyHchsNX2Q8kzm', NULL, '2017-10-01 04:32:25', '2017-10-01 04:32:25'),
(5, 'Benoit', 'Hart', 'admin@admin.com', '$2y$10$5xgqSzSz.4OIDMAVbqMsp.L66/r6rZkq1.8UrVKe.3eOCYvMoWnEK', 'admin', '2017-10-02 21:31:19', '2017-10-02 21:31:19'),
(3, 'Martin', 'Desgroseillers', 'staff1@staff.com', '$2y$10$k2H6zRhkCK.lLOTy8SdNw.VMhHvLvAJIISGVZBDas.YQGAlQMydMC', 'employee', '2017-10-02 21:08:51', '2017-10-02 21:08:51'),
(4, 'Manokith', 'Savejvong', 'staff2@staff.com', '$2y$10$EJvnsE4DUwrXMOXDq7DHR.ZkM58GPAWQUsdbPV7hRThxXIQhdUlCy', 'employee', '2017-10-02 21:09:28', '2017-10-02 21:09:28');

CREATE TABLE `vehicules` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `make` text TEXT,
  `model` text TEXT,
  `plate` text TEXT,
  `created` text TEXT,
  `modified` text TEXT,
  `user_id` int INTEGER,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)

INSERT INTO `vehicules` (`id`, `make`, `model`, `plate`, `created`, `modified`, `user_id`) VALUES
(7, 'Mazda', '3 Hatchback', 'E77 897', '2017-10-02 19:24:09', '2017-10-02 19:24:09', NULL),
(2, 'Toyota', 'yaris', 'R78 H87', '2017-10-01 04:34:22', '2017-10-01 04:34:22', NULL),
(3, 'Nissan', 'Versa', 'T69 HG6', '2017-10-01 04:35:56', '2017-10-01 04:35:56', NULL),
(4, 'Honda', 'Fit', 'HF7 HUO', '2017-10-01 04:36:24', '2017-10-01 04:36:24', NULL),
(5, 'Hyundai', 'Accent', 'HG6 D45', '2017-10-01 04:37:43', '2017-10-01 04:37:43', NULL);

	CREATE TABLE `customers` (
	  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
	  `first_name` text TEXT,
	  `last_name` text TEXT,
	  `email` text TEXT,
	  `phone` text TEXT,
	  `created` text TEXT,
	  `modified` text TEXT,
	  `user_id` int INTEGER,
		FOREIGN KEY (user_id) REFERENCES Users(id)
	)

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `user_id`) VALUES
(23, 'Salim', 'Feghali', 'salim@hotmail.com', '343-333-3333', '2017-09-29 00:42:26', '2017-09-29 00:42:26', 3),
(22, 'Remi', 'Graton', 'remig@hotmail.com', '450-968-9875', '2017-09-29 00:41:14', '2017-09-29 00:41:14', 2),
(21, 'Pravith', 'Vongphachanh', 'pravithv@hotmail.com', '514-893-8934', '2017-09-29 00:40:11', '2017-09-29 00:40:11', 2),
(24, 'Etienne', 'Audet Cobello', 'etienne@gmail.com', '514-555-6666', '2017-09-29 00:42:52', '2017-09-29 00:42:52', 3);

CREATE TABLE `lessons` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `user_id` int INTEGER,
  `title` text TEXT,
  `description` text TEXT,
  `price` text TEXT,
  `created` text TEXT,
  `modified` text TEXT,
   FOREIGN KEY ('user_id') REFERENCES Users('id')
)

INSERT INTO `lessons` (`id`, `user_id`, `title`, `description`, `price`, `created`, `modified`) VALUES
(15, 3, 'Road sign', 'This lesson will teach you about road sign and theur meaning', '20$', '2017-10-03 00:50:08', '2017-10-03 01:03:02'),
(13, 5, 'Driving practice', 'This lesson will teach you how to drice and practice a class 5 car', '50$/lesson', '2017-10-03 00:20:11', '2017-10-03 00:20:57'),
(16, 4, 'Slip road', 'This lesson will teach you how to control your car when slipping on ice during winter', '75$', '2017-10-03 03:01:20', '2017-10-03 03:03:37');

CREATE TABLE `lessons_vehicules` (
  `lesson_id` INTEGER PRIMARY KEY,
  `vehicule_id` int INTEGER ,
    FOREIGN KEY (vehicule_id) REFERENCES Vehicules(id)
)

INSERT INTO `lessons_vehicules` (`lesson_id`, `vehicule_id`) VALUES
(7, 7),
(10, 7),
(13, 7),
(16, 2);

CREATE TABLE `lessons_files` (
  `id` INTEGER PRIMARY KEY ASC,
  `lesson_id` int INTEGER,
  `file_id` int INTEGER
)

INSERT INTO `lessons_files` (`id`, `lesson_id`, `file_id`) VALUES
(1, 7, 1),
(2, 8, 2),
(5, 10, 2),
(6, 13, 2),
(8, 15, 3),
(9, 16, 1);

CREATE TABLE i18n (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `locale` text TEXT  ,
  `model` text TEXT  ,
  `foreign_key` int INTEGER  ,
  `field` text TEXT  ,
  `content` text TEXT
   
)

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Lessons', 13, 'title', 'Cours de conduite pratique'),
(2, 'fr_CA', 'Lessons', 13, 'description', 'Ce cours vous permet d\apprendre a conduire un vehicule de classe 5 promenade'),
(3, 'fr_CA', 'Lessons', 13, 'price', '50$/cours'),
(4, 'fr_CA', 'Lessons', 15, 'title', 'Panneau de circulation'),
(5, 'fr_CA', 'Lessons', 15, 'description', 'Ce cours vous apprend sur les panneaux de circulation et leur signification'),
(6, 'fr_CA', 'Lessons', 15, 'price', ''),
(7, 'fr_CA', 'Lessons', 16, 'title', 'Dérapage hiver'),
(8, 'fr_CA', 'Lessons', 16, 'description', 'Ce cours permet de pratiquer et savoir comment contrôler un véhicule lors dérapage sur glace'),
(9, 'fr_CA', 'Lessons', 16, 'price', '75$');

CREATE TABLE `files` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `name` text TEXT,
  `path` text TEXT,
  `created` text TEXT,
  `modified` text TEXT,
  `status` int INTEGER,
  `user_id` int INTEGER
    
)

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`, `user_id`) VALUES
(1, 'derapage.jpg', 'Files/', '2017-10-02 22:36:05', '2017-10-02 22:36:05', 1, 5),
(2, 'driving.jpg', 'Files/', '2017-10-02 22:36:42', '2017-10-02 22:36:42', 1, 3),
(3, 'roadsigns.jpg', 'Files/', '2017-10-02 22:37:59', '2017-10-02 22:37:59', 1, 4);