-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jul 2014 um 15:30
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `artistpage`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `comp_content` text NOT NULL,
  `comp_id` int(8) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(150) NOT NULL,
  `comp_active` int(1) NOT NULL,
  `comp_position` int(2) NOT NULL,
  `comp_width` varchar(10) NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `components`
--

INSERT INTO `components` (`comp_content`, `comp_id`, `comp_name`, `comp_active`, `comp_position`, `comp_width`) VALUES
('<!-- Main jumbotron for a primary marketing message or call to action -->\r\n<div class="jumbotron">\r\n<div class="container">\r\n<h1>Hello, world!</h1>\r\n\r\n<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>\r\n\r\n<p>Learn more &raquo;</p>\r\n</div>\r\n</div>\r\n', 1, '', 1, 1, '12'),
('<form>\n						<div class="form-group">\n							<input type="text" class="form-control" title="Zwischen 3 und 20 Zeichen nur Buchstaben und Zahlen" pattern="[A-Za-z0-9]{3,20}" autofocus></input>\n						</div>\n						<div class="form-group">\n							<input type="password" class="form-control" title="Zwischen 8 und 30 Zeichen nur Buchstaben und Zahlen" pattern="[A-Za-z0-9]{8,30}" autofocus required></input>\n						</div>	\n\n						<div class="form-group">\n							<input type="submit" class="btn btn-default" value="Submit" />\n						</div>	\n					</form>', 4, 'Login', 1, 4, '6'),
('<table class="table table-striped">\n<tr>\n<td>spalte 1</td>\n<td>spalte 2</td>\n<td>spalte 3</td>\n<td>spalte 4</td>\n</tr>\n<tr>\n<td>spalte 1</td>\n<td>spalte 2</td>\n<td>spalte 3</td>\n<td>spalte 4</td>\n</tr>\n</table>', 9, 'table', 1, 8, '12'),
('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 10, 'Col1', 1, 10, '4'),
('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 11, 'col2', 1, 11, '4'),
('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 12, 'col3', 1, 12, '4'),
('<form>\n						<div class="form-group">\n							<input type="text" class="form-control" title="Zwischen 3 und 20 Zeichen nur Buchstaben und Zahlen" pattern="[A-Za-z0-9]{3,20}" autofocus></input>\n						</div>\n						<div class="form-group">\n							<input type="password" class="form-control" title="Zwischen 8 und 30 Zeichen nur Buchstaben und Zahlen" pattern="[A-Za-z0-9]{8,30}" autofocus required></input>\n						</div>	\n						<div class="form-group">\n							<input type="password" class="form-control" title="Zwischen 8 und 30 Zeichen nur Buchstaben und Zahlen" pattern="[A-Za-z0-9]{8,30}" autofocus required></input>\n						</div>	\n						<div class="form-group">\n							<input type="submit" class="btn btn-default" value="Submit" />\n						</div>	\n					</form>', 23, 'Register', 1, 3, '6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
