SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`username`, `firstName`, `lastName`, `email`, `password`) VALUES
('admin1', 'Admin', 'user', 'admin1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

CREATE TABLE `stories` (
    `username` VARCHAR(255) ,
    `title` VARCHAR(255),
    `story` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

