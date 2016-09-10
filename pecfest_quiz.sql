-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 11:28 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pecfest_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `PecfestId` varchar(7) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `TotalScore` int(11) NOT NULL DEFAULT '0',
  `TotalTime` int(11) NOT NULL DEFAULT '0',
  `Qz1MaxScore` int(11) NOT NULL DEFAULT '0',
  `Qz1MaxTime` int(11) NOT NULL DEFAULT '0',
  `Qz2MaxScore` int(11) NOT NULL,
  `Qz2MaxTime` int(11) NOT NULL,
  `Qz3MaxScore` int(11) NOT NULL,
  `Qz3MaxTime` int(11) NOT NULL,
  `Qz4MaxScore` int(11) NOT NULL,
  `Qz4MaxTime` int(11) NOT NULL,
  `Qz5MaxScore` int(11) NOT NULL,
  `Qz5MaxTime` int(11) NOT NULL,
  `Qz6MaxScore` int(11) NOT NULL,
  `Qz6MaxTime` int(11) NOT NULL,
  `Qz7MaxScore` int(11) NOT NULL,
  `Qz7MaxTime` int(11) NOT NULL,
  `Qz8MaxScore` int(11) NOT NULL,
  `Qz8MaxTime` int(11) NOT NULL,
  `Qz9MaxScore` int(11) NOT NULL,
  `Qz9MaxTime` int(11) NOT NULL,
  PRIMARY KEY (`PecfestId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`PecfestId`, `Name`, `TotalScore`, `TotalTime`, `Qz1MaxScore`, `Qz1MaxTime`, `Qz2MaxScore`, `Qz2MaxTime`, `Qz3MaxScore`, `Qz3MaxTime`, `Qz4MaxScore`, `Qz4MaxTime`, `Qz5MaxScore`, `Qz5MaxTime`, `Qz6MaxScore`, `Qz6MaxTime`, `Qz7MaxScore`, `Qz7MaxTime`, `Qz8MaxScore`, `Qz8MaxTime`, `Qz9MaxScore`, `Qz9MaxTime`) VALUES
('ROB1995', 'TestPlayer1', 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('PER101', 'TestPlayer2', 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `qzno` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `ques` varchar(300) NOT NULL,
  `opt1` varchar(150) NOT NULL,
  `opt2` varchar(150) NOT NULL,
  `opt3` varchar(150) NOT NULL,
  `opt4` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`qzno`, `quid`, `ques`, `opt1`, `opt2`, `opt3`, `opt4`) VALUES
(1, 1, 'Which superhero carries an indestructible shield?', ' Captain America', 'The Green Lantern', 'Captain Flag', 'The Red Tornado'),
(1, 2, ' Which character is often romantically paired with Batman? ', 'Catwoman ', 'Miss America', ' The Black Canary', ' Hawkgirl '),
(1, 3, 'Which superhero started out as a petty criminal? ', '  Plastic Man ', 'Spiderman ', ' The Blue Knight ', ' The Atom'),
(1, 4, ' Which superhero''s alter ego is Raymond Palmer? ', ' The Atom ', ' Hawkman ', ' The Green Arrow', ' The Tornado'),
(1, 5, 'Which superhero is associated with the phrase, "With great power there must also come great responsibility"? ', ' Spiderman ', ' Hell Boy', 'Batman', 'The Hulk '),
(1, 6, 'Which superhero is nicknamed the "Scarlett Speedster"? ', 'The Flash ', 'Speedball ', 'Stardust ', ' The Thing'),
(1, 7, 'Which superhero is dubbed the "Man without Fear"? ', ' Daredevil', ' The Flash', ' Wolverine ', ' Green Lantern'),
(1, 8, 'Which superhero is the medical doctor for the X-men? ', ' The Beas', 'Ice Man', 'Shadowcat ', 'Storm'),
(1, 9, ' Who is Batgirl''s father (Barbara Gordon)?', 'The Chief of Police', 'Batman''s Butler', 'Governor ', 'The Mayor'),
(1, 10, ' Which superhero gains his power from a ring?', 'The Green Lantern ', ' Storm ', 'Dazzler ', ' The Hulk'),
(1, 11, 'Which superhero can manipulate the weather?', 'Storm', 'Tornado', 'Atom ', 'Thing'),
(1, 12, ' Which Island does Wonder Woman call home? ', 'Paradise Island', 'Emerald Island', ' Amazonia ', 'Eden Isle'),
(1, 13, 'Where does the Green Arrow operate? ', ' Star City', 'Gotham', 'Atlanta', 'Chicago'),
(1, 14, 'Which superhero was given a special serum to help the war effort? ', 'Captain America', 'Spiderman ', 'Hulk', 'Wolfman'),
(1, 15, 'Which Superhero''s tagline is "It''s clobbering time"?', 'Thing', 'Plastic Man', 'Spiderman', 'Captain America'),
(1, 16, 'Which superhero is also known as Ronin and Goliath?', 'Hawkeye', 'Cyclops', 'Iron Man', 'Beast'),
(1, 17, 'What is Superman''s love interest called?  ', 'Lois Lane  ', 'Patience Phillips', 'Samantha Sampson', 'Lucy Longstockin'),
(1, 18, 'Peyton Westlake is also known as what?  ', 'Darkman ', 'Darkboy ', 'Dark Knight  ', 'Dancer in the Dark'),
(1, 19, 'What is Spider-Man''s real name?  ', 'Peter Parker', 'Peter Picker  ', 'Peter Parkinson  ', 'Peter Pepper'),
(1, 20, 'What is Catwoman''s real name?', 'Patience Phillips  ', 'Patsy Palmer ', 'Portia Pearson', 'Penelope Parkinson  '),
(1, 21, ' What planet is Superman from?', 'Krypton', ' Omega 5', ' Alpha Centauri  ', 'Zyzzyx'),
(1, 22, 'The Batman movies take place in which of the following?', 'Gotham City', 'Gothic City ', 'Goth City  ', 'Glasgow'),
(1, 23, 'What is the name of Batman''s sidekick?', 'Robin ', 'Roy', 'Robson', 'Richard'),
(1, 24, 'Which newspaper does Clark Kent work for in Superman?', 'The Daily Planet  ', 'The Daily Moon', 'The Daily Star', 'The Daily Satellite'),
(1, 25, ' Which of the following is not one of the Watchmen?', ' Wolverine', ' Night Owl II ', 'Silk Specter II', 'Ozymandias '),
(1, 26, 'What is the name of Spider-Man''s love interest?  ', 'Mary Jane Watson', 'Emma Peel ', 'Electra', 'Lady DeathStrike'),
(1, 27, 'Wolverine is also known as what?  ', 'Logan', 'Hogan', 'Wogun', 'Shotgun'),
(1, 28, 'Lamont Cranston is also known as what?  ', 'The Shadow ', 'The Phantom', 'The Lizard ', 'The Hulk '),
(1, 29, 'Who is Superman''s Arch enemy?', 'Lex Luthor', 'The Green Goblin ', 'Silver Surfer', 'The Joker'),
(1, 30, 'Who played Supergirl in Supergirl: The Movie?', 'Helen Slater ', 'Helen Hunt', 'Helen Mirren ', 'Helena Bonham Carter'),
(1, 31, 'What is The Phantom''s real name?  ', 'Kit Walker', 'Kris Walton  ', 'Kat Wilson ', 'Konrad Walmington '),
(1, 32, 'Norman Osborn is also known as who?  ', 'The Green Goblin', 'Doctor Octopus  ', 'Penguin', 'Lex Luthor'),
(1, 33, 'Who played Batman in Batman Forever? ', ' Val Kilmer ', 'George Clooney', 'Christian Bale', 'Michael Keaton'),
(1, 34, 'Which of the following powers does X-Men Colossus have? ', 'Turn into steel ', 'Change weather', 'Read Minds', 'Turn invisible'),
(1, 35, 'Which of the following is not one of the League Of Extraordinary Gentlemen? ', 'Huckleberry Finn', ' Dorian Gray ', 'Tom Sawyer', 'Captain Nemo'),
(1, 36, 'Steve Rogers is also known as who? ', 'Captain America ', 'Captain Austria', 'Captain Argentina', 'Captain Australia'),
(1, 37, 'What is Daredevil''s real name?', 'Matt Murdock', 'Mick Monroe  ', 'Michael Madsen ', 'Maurice Micklethwaite'),
(1, 38, 'Blade is a superhero but he''s also a what?  ', 'Vampire', 'Werewolf', 'Alcoholic', 'Primary School Teacher'),
(1, 39, 'Which character did Heath Ledger play in The Dark Knight?  ', ' The Joker ', 'The Penguin  ', 'Batman', 'Robin'),
(1, 40, 'Who directed Hellboy in 2004?  ', 'Guillermo del Toro  ', 'Steven Spielberg ', 'Matin Scorsese', 'Sam Raimi'),
(1, 41, 'Which of the X-Men is also known as Bobby Drake? ', 'Iceman  ', 'Storm ', 'Cyclops', 'Rogue'),
(1, 42, 'Name the family in The Incredibles.', 'The Parrs', 'The Barrs', 'The Charrs', 'the Starrs'),
(1, 43, 'Daredevil is also known as what? ', 'The Man Without Fear ', 'The Man Without Hair', 'The Man in Red', 'The Man without Gear'),
(1, 44, 'What is the Incredible Hulk''s real name?  ', 'Bruce Banner', 'Dr Bruce Wayne  ', ' Dr Bruce Forsyth  ', 'Dr Bruce Springsteen'),
(1, 45, 'Who starred as The Shadow in the 1994 movie? ', 'Alec Baldwin', 'George Clooney', 'Billy Zane ', 'Michael Keaton'),
(1, 46, 'Name the vigilante superhero played by Will Smith. ', 'Hancock', 'Jones ', 'Burnley', 'Sampson '),
(1, 47, '“In brightest day, in darkest night” no evil escapes this superhero’s sight', 'Green Lantern', 'Superman', 'Hawkeye', 'Daredevil'),
(1, 48, 'Wolverine’s claws are made of what material?', 'Adamantium ', 'Steel ', 'Titanium', 'Iron'),
(1, 49, 'What was the special ingredient used in the super serum that made Captain America? ', 'Vita Rays', 'Gamma rays', 'UV Rays', 'Titan Rays'),
(1, 50, 'Which of these superheroes is not a member of the Justice League of America (JLA)? ', 'Black Panther', 'Aquaman ', 'Wonder Woman', 'The Flash'),
(2, 1, 'Another name for Superman is the Man of what? ', 'Steel ', 'Earth', 'Krypton', 'Saturn'),
(2, 2, 'Who played Ironman in the latest Ironman movies? ', 'Robert Downey Junior', 'Christian Bale', 'Salman Khan', 'Tom Hanks'),
(2, 3, 'This superhero was born in the Amazon and could rely on an assortment of superhero gadgets if need be including: indestructible bracelets, an invisible plane, and a lasso of truth. ', 'Wonder Woman ', 'Cat Woman', 'Storm', 'Elektra'),
(2, 4, 'What is Superman''s Kryptonian name? ', 'Kal-el', 'Xxyxx', 'Clark Kent', 'Bruce Banner'),
(2, 5, 'What name was Wolverine born as? ', 'James Howlett', 'Logan', 'Hogan', 'Joe Hart'),
(2, 6, 'Actress Halle Berry played which two comic heroines?', 'Storm and Cat Woman', 'Storm and Mary Jane', 'Elektra and Mary Jane', 'Wonder Woman and The Thing'),
(2, 7, 'Thor was the son of whom?', 'Odin', 'Saturn', 'Krypton', 'Earth'),
(2, 8, 'What was the name of the top secret project which changed Steve Rogers into Captain America? ', 'Operation Rebirth', 'Operation Revival', 'Operation Wake', 'Operation Hero'),
(2, 9, 'People who have the X gene are known as what? ', 'Mutants ', 'Women', 'Men', 'Superheros'),
(2, 10, 'Kurt Wagner (“Vaagner”) is this superhero’s real name.', 'Nightcrawler ', 'Night Shadow', 'Night Rider', 'The Dark Knight'),
(2, 11, 'What newspaper does Peter Parker work for?', 'The Daily Bugle', 'The Daily Post', 'Daily Show', 'Daily Planet'),
(2, 12, 'What is the name of S.H.I.E.L.D’s highest ranking agent? ', 'Nick Fury', 'Steve Rogers', 'Bruce Banner', 'Alfred'),
(2, 13, 'What was the name of Batman’s trainer/mentor?', 'Raz-Al Gul', 'Alfred', 'Penguin', 'Joker'),
(2, 14, ' In the Captain America movie, what was the name of the evil organization the hero was fighting? ', 'Hydra ', 'Nemesis', 'Raz-Al Gul', 'Nazis'),
(2, 15, ' What type of metal cover’s Wolverine’s bones?', 'Adamantium ', 'Steel', 'Iron', 'Titanium'),
(2, 16, 'What is the power source IronMan uses called?', 'Arc Reactor', 'Heart Reactor', 'Tessaract', 'Kryptonite'),
(2, 17, 'What is the name of the actor who plays Thor? ', 'Chris Hemsworth ', 'Robert Downey Jr.', 'Christian Bale', 'Toby Maguire'),
(2, 18, 'Who is the best superhero ever?', 'Batman ', 'Superman', 'Iron Man', 'Captain America'),
(2, 19, 'What was Bruce Banner exposed to that turned him into the Hulk?', 'Gamma Radiation ', 'UV radiation', 'Infrared Radiation', 'Vita Radiation'),
(2, 20, 'What was “Professor X’s” real name? ', 'Charles Xavier ', 'Payet', 'Stark', 'Professor Beast'),
(2, 21, '  What How I Met Your Mother star was also the voice of Spiderman in a popular cartoon series?', 'Neil Patrick Harris', 'Jason Segel', 'Josh Radnor', 'Allyson Hannigan'),
(2, 22, ' What color is the suit that The Tick - a comical superhero and star of two TV shows - wears?', 'Blue', 'Red', 'Green', 'Black'),
(2, 23, 'Which of these actors has not played the Joker in a major Batman movie?', 'Peter o'' Toole', 'Jack Nicholson', 'Heath Ledger', 'Cesar Romero'),
(2, 24, 'On what TV network did the superhero series Smallville and Arrow first air?', 'CW/WB', 'PBS', 'HBO', 'CBS'),
(2, 25, ' How much did the first-ever comic book featuring Superman - dating back to 1939 - sell for in 2011?', '$2.2 million', '$1.4 million ', '$33,000 ', '$11.5 million'),
(2, 26, 'What kind of plane does Wonder Woman fly?', 'Invisible ', ' Love-powered', 'Boeing 767', 'Talking'),
(2, 27, 'Which of these villains does NOT appear in 1997’s Batman and Robin?', 'Two-Face', 'Poison Ivy', 'Mr. Freeze', 'Bane '),
(2, 28, ' Which member of the Fantastic Four is Ben Grimm?', 'The Thing', 'The Human Torch ', 'Mr. Fantastic', 'Invisible Woman'),
(2, 29, 'This superhero uses a magic ring to fight bad guys?', 'Green Lantern ', 'Green Arrow', 'Green Hornet', 'Greenzo'),
(2, 30, 'What kind of hairstyle do most versions of Lex Luthor - Superman’s main villain - have?', 'Bald ', 'Mohawk', 'Fethered Hair', 'Cornrows'),
(2, 31, 'Matt Murdock', 'Daredevil', 'Hulk', 'Captain America', 'Batman'),
(2, 32, 'Bruce Banner', 'Hulk', 'Daredevil', 'Super Girl', 'Superman'),
(2, 33, 'Diana Prince', 'Wonder Woman', 'Hulk', 'He-Man', 'Spiderman'),
(2, 34, 'Joe Dredd', 'Jugde Dredd', 'Wonder Woman', 'Spawn', 'Captain America'),
(2, 35, 'Oliver Queen', 'Green Arrow', 'Jugde Dredd', 'Green Hornet', 'Super Girl'),
(2, 36, 'Bruce Wayne', 'Batman', 'Green Arrow', 'Radio Active Man', 'He-Man'),
(2, 37, 'Clark Kent', 'Superman', 'Batman', 'Comet', 'Spawn'),
(2, 38, 'Peter Parker', 'Spiderman', 'Superman', 'Plastic Man', 'Green Hornet'),
(2, 39, 'Steve Rogers', 'Captain America', 'Spiderman', 'Fash', 'Radio Active Man'),
(2, 40, 'Linda Lee Danvers', 'Super Girl', 'Captain America', 'Green Lantern', 'Comet'),
(2, 41, 'Prince Adam', 'He-Man', 'Super Girl', 'Phantom', 'Plastic Man'),
(2, 42, 'Al Simmons', 'Spawn', 'He-Man', 'Daredevil', 'Flash'),
(2, 43, 'Britt Reid', 'Green Hornet', 'Spawn', 'Hulk', 'Daredevil'),
(2, 44, 'Claude Kane III', 'Radio Active Man', 'Green Hornet', 'Wonder Woman', 'Hulk'),
(2, 45, 'John Dickering', 'Comet', 'Radio Active Man', 'Jugde Dredd', 'Wonder Woman'),
(2, 46, 'Ed O''Brian', 'Plastic Man', 'Comet', 'Green Arrow', 'Jugde Dredd'),
(2, 47, 'Jay Garrick', 'Flash', 'Plastic Man', 'Batman', 'Green Arrow'),
(2, 48, 'Alan Scott, or Hal Jordan, or Kyle Rayner', 'Green Lantern', 'Flash', 'Superman', 'Comet'),
(2, 49, 'Kit Walker, or Sir Christopher Standish', 'Phantom', 'Green Lantern', 'Spiderman', 'Plastic Man'),
(2, 50, 'Lamont Cranston, or Kent Allard', 'Shadow', 'Phantom', 'Krrish', 'Flash');

-- --------------------------------------------------------

--
-- Table structure for table `quiz1results`
--

CREATE TABLE IF NOT EXISTS `quiz1results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ1A` int(11) NOT NULL DEFAULT '0',
  `QZ1Score` int(11) NOT NULL DEFAULT '0',
  `QZ1Time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz2results`
--

CREATE TABLE IF NOT EXISTS `quiz2results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ2A` int(11) NOT NULL,
  `QZ2Score` int(11) NOT NULL,
  `QZ2Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz3results`
--

CREATE TABLE IF NOT EXISTS `quiz3results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ3A` int(11) NOT NULL,
  `QZ3Score` int(11) NOT NULL,
  `QZ3Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz4results`
--

CREATE TABLE IF NOT EXISTS `quiz4results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ4A` int(11) NOT NULL,
  `QZ4Score` int(11) NOT NULL,
  `QZ4Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz5results`
--

CREATE TABLE IF NOT EXISTS `quiz5results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ5A` int(11) NOT NULL,
  `QZ5Score` int(11) NOT NULL,
  `QZ5Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz6results`
--

CREATE TABLE IF NOT EXISTS `quiz6results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ6A` int(11) NOT NULL,
  `QZ6Score` int(11) NOT NULL,
  `QZ6Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz7results`
--

CREATE TABLE IF NOT EXISTS `quiz7results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ7A` int(11) NOT NULL,
  `QZ7Score` int(11) NOT NULL,
  `QZ7Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz8results`
--

CREATE TABLE IF NOT EXISTS `quiz8results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ8A` int(11) NOT NULL,
  `QZ8Score` int(11) NOT NULL,
  `QZ8Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz9results`
--

CREATE TABLE IF NOT EXISTS `quiz9results` (
  `PecfestId` varchar(7) NOT NULL,
  `QZ9A` int(11) NOT NULL,
  `QZ9Score` int(11) NOT NULL,
  `QZ9Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
