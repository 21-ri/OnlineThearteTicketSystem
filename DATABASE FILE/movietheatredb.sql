 -- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 06, 2022 at 04:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `movietheatredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
(1, 'TID001', 1, 101, 1, 1, 2, 200, '2023-06-01', '2023-06-01', 1),
(2, 'TID002', 2, 102, 1, 1, 3, 300, '2023-06-02', '2023-06-02', 1),
(3, 'TID003', 1, 103, 2, 2, 4, 400, '2023-06-03', '2023-06-03', 1),
(4, 'TID004', 3, 104, 2, 2, 2, 200, '2023-06-04', '2023-06-04', 1),
(5, 'TID005', 2, 105, 3, 1, 1, 100, '2023-06-05', '2023-06-05', 1),
(6, 'TID006', 1, 106, 3, 1, 3, 300, '2023-06-06', '2023-06-06', 1),
(7, 'TID007', 3, 107, 1, 2, 2, 200, '2023-06-07', '2023-06-07', 1),
(8, 'TID008', 2, 108, 1, 2, 3, 300, '2023-06-08', '2023-06-08', 1),
(9, 'TID009', 1, 109, 3, 1, 4, 400, '2023-06-09', '2023-06-09', 1),
(10, 'TID010', 3, 110, 3, 2, 2, 200, '2023-06-10', '2023-06-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 101, 'user1@example.com', 'password1', 1),
(2, 102, 'user2@example.com', 'password2', 1),
(3, 103, 'user3@example.com', 'password3', 1),
(4, 104, 'user4@example.com', 'password4', 1),
(5, 105, 'user5@example.com', 'password5', 1),
(6, 106, 'user6@example.com', 'password6', 1),
(7, 107, 'user7@example.com', 'password7', 1),
(8, 108, 'user8@example.com', 'password8', 1),
(9, 109, 'user9@example.com', 'password9', 1),
(10, 110, 'user10@example.com', 'password10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(255) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`) VALUES
(1, 1, 'Avengers: Endgame', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'After the devastating events of Avengers: Infinity War, the universe is in ruins. The remaining Avengers must assemble once again to undo Thanos actions and restore order to the universe.', '2019-04-26', 'https://example.com/images/avengers-endgame.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 0),
(2, 2, 'The Dark Knight', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'Batman, Gordon, and Harvey Dent are forced to deal with the chaos unleashed by an anarchist mastermind known only as the Joker, as it drives each of them to their limits.', '2008-07-18', 'https://example.com/images/the-dark-knight.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 0),
(3, 1, 'Inception', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', '2010-07-16', 'https://example.com/images/inception.jpg', 'https://www.youtube.com/watch?v=YoHD9XEInc0', 0),
(4, 3, 'Pulp Fiction', 'John Travolta, Uma Thurman, Samuel L. Jackson', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', '1994-10-14', 'https://example.com/images/pulp-fiction.jpg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY', 0),
(5, 2, 'The Shawshank Redemption', 'Tim Robbins, Morgan Freeman, Bob Gunton', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', '1994-09-23', 'https://example.com/images/shawshank-redemption.jpg', 'https://www.youtube.com/watch?v=NmzuHjWmXOc', 0),
(6, 1, 'The Godfather', 'Marlon Brando, Al Pacino, James Caan', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', '1972-03-24', 'https://example.com/images/the-godfather.jpg', 'https://www.youtube.com/watch?v=sY1S34973zA', 0),
(7, 3, 'The Matrix', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', '1999-03-31', 'https://example.com/images/the-matrix.jpg', 'https://www.youtube.com/watch?v=m8e-FF8MsqU', 0),
(8, 2, 'The Lion King', 'Donald Glover, Beyoncé, Seth Rogen', 'After the murder of his father, a young lion prince flees his kingdom only to learn the true meaning of responsibility and bravery.', '2019-07-19', 'https://example.com/images/the-lion-king.jpg', 'https://www.youtube.com/watch?v=4CbLXeGSDxg', 0),
(9, 1, 'Jurassic Park', 'Sam Neill, Laura Dern, Jeff Goldblum', 'A pragmatic paleontologist visiting an almost complete theme park is tasked with protecting a couple of kids after a power failure causes the parks cloned dinosaurs to run loose.', '1993-06-11', 'https://example.com/images/jurassic-park.jpg', 'https://www.youtube.com/watch?v=lc0UehYemQA', 0),
(10, 3, 'Fight Club', 'Brad Pitt, Edward Norton, Helena Bonham Carter', 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', '1999-10-15', 'https://example.com/images/fight-club.jpg', 'https://www.youtube.com/watch?v=SUXWAEX2jlg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(3, 'Thor: Love and Thunder', 'Chris Hemsworth, Natalie Portman, Christian Bale, Tessa Thompson', '2022-07-08', '\"Thor: Love and Thunder\" finds Thor (Chris Hemsworth) on a journey unlike anything he\'s ever faced -- a quest for inner peace.', 'news_images/thor.jpeg'),
(9, 'Jurassic World Dominion', 'Chris Pratt, Bryce Dallas Howard, Laura Dern, Jeff Goldblum', '2022-06-10', 'Chris Pratt and Bryce Dallas Howard are joined by Oscar®-winner Laura Dern, Jeff Goldblum and Sam Neill in Jurassic World Dominion, a bold, timely and breathtaking new adventure that spans the globe.', 'news_images/jwd.jpg'),
(10, 'Avatar: The Way of Water', 'Richard Madden, Salma Hayek, Angelina Jolie, Kit Harrington', '2022-12-16', 'Set more than a decade after the events of the first film, \"Avatar: The Way of Water\" begins to tell the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the l', 'news_images/av.jpg'),
(1, 'Avengers: Endgame Breaking Box Office Records', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', '2019-05-01', 'Avengers: Endgame, the epic conclusion to the Marvel Cinematic Universe\'s Infinity Saga, has shattered box office records, grossing over $1.2 billion worldwide in its opening weekend.', 'https://example.com/news/avengers-endgame-box-office.pdf'),
(2, 'The Dark Knight Wins Academy Awards', 'Christian Bale, Heath Ledger, Aaron Eckhart', '2009-02-22', 'The Dark Knight, directed by Christopher Nolan, has received critical acclaim and recognition at the 81st Academy Awards. Heath Ledger posthumously won the Best Supporting Actor award for his iconic portrayal of the Joker.', 'https://example.com/news/dark-knight-academy-awards.pdf'),
(3, 'Inception Sequel Confirmed', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', '2022-08-10', 'Fans of Inception can rejoice as director Christopher Nolan has officially confirmed a sequel to the mind-bending sci-fi thriller. The sequel is expected to delve deeper into the concept of dream-sharing and explore new dimensions of the story.', 'https://example.com/news/inception-sequel-confirmed.pdf'),
(4, 'Pulp Fiction Anniversary Screening', 'John Travolta, Uma Thurman, Samuel L. Jackson', '2019-10-14', 'To celebrate the 25th anniversary of Quentin Tarantino\'s Pulp Fiction, a special screening will be held at the renowned Cannes Film Festival. Fans will have the opportunity to experience the timeless masterpiece on the big screen once again.', 'https://example.com/news/pulp-fiction-anniversary-screening.pdf'),
(5, 'The Shawshank Redemption Added to National Film Registry', 'Tim Robbins, Morgan Freeman, Bob Gunton', '2015-12-16', 'The Shawshank Redemption, directed by Frank Darabont, has been selected for preservation in the United States National Film Registry by the Library of Congress. The film continues to captivate audiences with its powerful storytelling and memorable performances.', 'https://example.com/news/shawshank-redemption-national-film-registry.pdf'),
(6, 'The Godfather: Celebrating 50 Years', 'Marlon Brando, Al Pacino, James Caan', '2022-03-24', 'As The Godfather turns 50, fans and critics reflect on its enduring legacy in the world of cinema. Directed by Francis Ford Coppola, this iconic crime drama continues to be revered for its brilliant performances and compelling storytelling.', 'https://example.com/news/godfather-50-years-celebration.pdf'),
(7, 'The Matrix Trilogy Returning to Theaters', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', '2021-09-15', 'Prepare to re-enter the Matrix! Warner Bros. has announced a limited theatrical re-release of The Matrix trilogy, giving audiences the opportunity to experience the groundbreaking sci-fi series on the big screen once again.', 'https://example.com/news/matrix-trilogy-theater-re-release.pdf'),
(8, 'The Lion King: Broadway Revival Cast Announced', 'Donald Glover, Beyoncé, Seth Rogen', '2022-06-01', 'Disney\'s beloved musical, The Lion King, is set to return to Broadway with an exciting new cast. The revival production promises to bring back the magic and awe-inspiring visuals of the African savannah to theatergoers.', 'https://example.com/news/lion-king-broadway-revival-cast.pdf'),
(9, 'James Bond 007: New Film Title Revealed', 'Daniel Craig, Rami Malek, Léa Seydoux', '2023-01-05', 'The upcoming James Bond film, starring Daniel Craig in his final outing as 007, has finally received its official title. Titled "No Time to Die," the film promises thrilling action, suspense, and the iconic charm of the world\'s favorite spy.', 'https://example.com/news/james-bond-no-time-to-die.pdf'),
(10, 'Wonder Woman 3 in Development', 'Gal Gadot, Chris Pine, Kristen Wiig', '2023-04-19', 'The adventures of Wonder Woman continue as Warner Bros. has officially announced the development of Wonder Woman 3. Gal Gadot will reprise her role as the Amazonian warrior, delivering another empowering and action-packed cinematic experience.', 'https://example.com/news/wonder-woman-3-development.pdf');
-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`) VALUES
(1, 'John Doe', 'johndoe@example.com', '1234567890', 25, 'Male'),
(2, 'Jane Smith', 'janesmith@example.com', '9876543210', 30, 'Female'),
(3, 'Michael Johnson', 'michaeljohnson@example.com', '4567890123', 35, 'Male'),
(4, 'Emily Davis', 'emilydavis@example.com', '7890123456', 28, 'Female'),
(5, 'David Brown', 'davidbrown@example.com', '2345678901', 32, 'Male'),
(6, 'Sarah Wilson', 'sarahwilson@example.com', '8901234567', 29, 'Female'),
(7, 'Daniel Taylor', 'danieltaylor@example.com', '3456789012', 27, 'Male'),
(8, 'Olivia Thomas', 'oliviathomas@example.com', '9012345678', 31, 'Female'),
(9, 'James Martinez', 'jamesmartinez@example.com', '5678901234', 26, 'Male'),
(10, 'Sophia Anderson', 'sophiaanderson@example.com', '0123456789', 33, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
(1, 1, 'Screen 1', 100, 10),
(2, 1, 'Screen 2', 80, 8),
(3, 2, 'Screen A', 120, 12),
(4, 2, 'Screen B', 90, 9),
(5, 3, 'Screen X', 150, 15),
(6, 3, 'Screen Y', 110, 11),
(7, 4, 'Screen I', 95, 9.5),
(8, 4, 'Screen II', 75, 7.5),
(9, 5, 'Screen Alpha', 130, 13),
(10, 5, 'Screen Beta', 105, 10.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
(19, 15, 6, 1, '2022-05-27', 0, 1),
(20, 20, 6, 11, '2022-05-06', 0, 1),
(21, 19, 6, 12, '2022-04-15', 1, 1),
(22, 18, 6, 13, '2021-03-04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(1, 1, 'Noon', '12:00:00'),
(2, 1, 'Afternoon', '15:00:00'),
(3, 1, 'Evening', '18:00:00'),
(4, 1, 'Night', '21:00:00'),
(5, 2, 'Morning', '09:00:00'),
(6, 2, 'Matinee', '13:00:00'),
(7, 2, 'Evening', '17:00:00'),
(8, 2, 'Late Night', '23:00:00'),
(9, 3, 'First Show', '10:00:00'),
(10, 3, 'Afternoon', '13:30:00'),
(11, 3, 'Evening', '17:30:00'),
(12, 3, 'Night', '21:30:00'),
(13, 4, 'Morning', '08:30:00'),
(14, 4, 'Matinee', '12:30:00'),
(15, 4, 'Evening', '16:30:00'),
(16, 4, 'Late Night', '22:30:00'),
(17, 5, 'Noon', '12:00:00'),
(18, 5, 'Afternoon', '15:00:00'),
(19, 5, 'Evening', '18:00:00'),
(20, 5, 'Night', '21:00:00'),
(21, 6, 'Morning', '09:00:00'),
(22, 6, 'Matinee', '13:00:00'),
(23, 6, 'Evening', '17:00:00'),
(24, 6, 'Late Night', '23:00:00'),
(25, 7, 'First Show', '10:00:00'),
(26, 7, 'Afternoon', '13:30:00'),
(27, 7, 'Evening', '17:30:00'),
(28, 7, 'Night', '21:30:00'),
(29, 8, 'Morning', '08:30:00'),
(30, 8, 'Matinee', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatre`
--

CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatre`
--

INSERT INTO `tbl_theatre` (`id`, `name`, `address`, `place`, `state`, `pin`) VALUES
(1, 'Cineplex 1', '123 Main Street', 'City A', 'State A', 12345),
(2, 'Movie World', '456 Broadway', 'City B', 'State B', 23456),
(3, 'Star Cinema', '789 Elm Street', 'City C', 'State C', 34567),
(4, 'Silver Screen', '321 Oak Avenue', 'City D', 'State D', 45678),
(5, 'Mega Movies', '654 Pine Street', 'City E', 'State E', 56789),
(6, 'Cinema Paradise', '987 Maple Avenue', 'City F', 'State F', 67890),
(7, 'Film House', '135 Cedar Street', 'City G', 'State G', 78901),
(8, 'Picture Palace', '864 Walnut Avenue', 'City H', 'State H', 89012),
(9, 'The Grand Theatre', '246 Birch Street', 'City I', 'State I', 90123),
(10, 'CineStar', '579 Oakwood Drive', 'City J', 'State J', 01234),
(11, 'Movie Magic', '159 Elmwood Avenue', 'City K', 'State K', 12340),
(12, 'Sunset Cinema', '260 Pinehurst Drive', 'City L', 'State L', 23451),
(13, 'Theatre Royal', '493 Maplewood Lane', 'City M', 'State M', 34562),
(14, 'Dreamland Cinemas', '726 Chestnut Street', 'City N', 'State N', 45673),
(15, 'Cinema World', '951 Oakridge Drive', 'City O', 'State O', 56784),
(16, 'Starlight Theatre', '382 Elm Avenue', 'City P', 'State P', 67895),
(17, 'City Cinema', '523 Maplewood Lane', 'City Q', 'State Q', 78906),
(18, 'Film City', '764 Chestnut Street', 'City R', 'State R', 89017),
(19, 'The Picture House', '307 Oakwood Drive', 'City S', 'State S', 90128),
(20, 'Metro Movies', '546 Pinehurst Drive', 'City T', 'State T', 01239),
(21, 'Cineplex 2', '789 Main Street', 'City U', 'State U', 12342),
(22, 'Movie Land', '012 Broadway', 'City V', 'State V', 23453),
(23, 'Starlite Cinema', '345 Elm Street', 'City W', 'State W', 34564),
(24, 'Silver Screen 2', '678 Oak Avenue', 'City X', 'State X', 45675),
(25, 'Mega Movies 2', '901 Pine Street', 'City Y', 'State Y', 56786),
(26, 'Cinema Deluxe', '234 Maple Avenue', 'City Z', 'State Z', 67897),
(27, 'Film Arena', '567 Cedar Street', 'City AA', 'State AA', 78908),
(28, 'Picture Perfect', '890 Walnut Avenue', 'City BB', 'State BB', 89019),
(29, 'The Majestic Theatre', '123 Birch Street', 'City CC', 'State CC', 90130),
(30, 'CineStar 2', '456 Oakwood Drive', 'City DD', 'State DD', 01231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
