SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('admin1', 'Admin', 'user', 'admin1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('rithujaa', 'Rithujaa', 'Rajendrakumar', 'rithujaa@gmail.com', 'f26df2ddf3225ab0d0052fe9a4026f7a');

CREATE TABLE `stories` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255),
  `title` VARCHAR(255),
  `story` TEXT,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stories` (`username`, `title`, `story`) VALUES
('admin1', 'Welcome to My Discussion Forum', 'You can find the navigation bar on the left where you can view your profile, search for stories and post a story. Hope you like this website :)');

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255),
  `story_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  FOREIGN KEY (`story_id`) REFERENCES `stories`(`story_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



