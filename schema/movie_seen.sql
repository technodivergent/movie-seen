SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- Table structure for table `movies`
CREATE TABLE IF NOT EXISTS `movies` (
  `mv_ID` int(11) NOT NULL,
  `mv_imdbID` text,
  `mv_title` text,
  `mv_year` text,
  `mv_rated` text,
  `mv_released` text,
  `mv_runtime` text,
  `mv_genre` text,
  `mv_director` text,
  `mv_writer` text,
  `mv_actors` text,
  `mv_plot` text,
  `mv_lang` text,
  `mv_country` text,
  `mv_awards` text,
  `mv_posterURL` text,
  `mv_metascore` text,
  `mv_imdbRating` text,
  `mv_imdbVotes` text,
  `mv_type` text
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `seen` mediumtext,
  `watchlist` mediumtext
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Indexes for table `movies`
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mv_ID`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

-- AUTO_INCREMENT for table `movies`
ALTER TABLE `movies`
  MODIFY `mv_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
