
--
-- Database: `member` and php web application user
CREATE DATABASE member;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON member.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE member;
--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  `date`  date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `salary`, `date`) VALUES
(1, 'Cole michael', 'C/ Araquil, 67, Madrid', 5000, "2019-03-30"),
(2, 'Victoria Ashworth', '35 King George, London', 6500, "2017-09-30"),
(3, 'Martin Blank', '25, Rue Lauriston, Paris', 8500, "2021-08-22"),
(4, 'Ayo Oni', '10 Scorpion rd, Madrid', 50000, "1999-03-30"),
(5, 'Delia Keirans', '35 Wintergroove, London', 16500, "2009-01-10"),
(6, 'Val Kinja', '25, Laval Street, Paris', 36500, "2018-11-29");