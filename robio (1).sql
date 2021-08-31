-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 11:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robio`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamestock`
--

CREATE TABLE `gamestock` (
  `game_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Rarity` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `image_provider` text NOT NULL,
  `desc_provider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamestock`
--

INSERT INTO `gamestock` (`game_id`, `name`, `Rarity`, `description`, `image`, `image_provider`, `desc_provider`) VALUES
(1, 'Invisible', 'Uncommon', 'This virus causes the Android\'s skin and body properties to become translucent. This does not harm the Android, or anyone else in any way so scientists can still get a blood sample from them safely. Surprisingly, the blood sample is not translucent.', 'https://i.gyazo.com/thumb/1200/dea0d6703001b7570371206ad6a0c28e-png.jpg', 'Xander_0406', 'Xander_0406'),
(2, 'Blood', 'Uncommon', 'Blood is one of the more common virus effects. This virus causes the android to develop blood marks that slowly get darker over time.', 'https://cdn.discordapp.com/attachments/581657947700985868/584128235965644812/Bio_2.jpg', '', ''),
(3, 'Green Bomb', 'Common', 'This virus effect is one of the more common viruses, causing the android to begin coughing, turn colors, and explode in a shower of bright green slime!', 'https://i.gyazo.com/19c67d18e1ece9de69bf2e7f9544143e.png', '', ''),
(4, 'FireXom', 'Rare', 'This virus is categorized as rare due to the inability of the android to last long enough for most of our scientists to get a blood sample. (Without succumbing to the virus themselves!) This virus causes the androids to burst into flames, as well as anyone the android comes into direct contact with.', 'https://i.gyazo.com/thumb/1200/39e100dcada89b1a7937253d708f51c9-png.jpg', '', ''),
(6, 'Mini', 'Uncommon', 'This virus effect is one of the more uncommon, but more sought after virus effects due to the cute nature it gives the androids! It causes - as is evident by the name of the virus itself - the android to shrink down to a much smaller stature.', 'https://cdn.discordapp.com/attachments/590939646784045071/591025298451988540/Annotation_2019-06-19_175728.jpg', 'Xander_0406', ''),
(12, 'Tentacles', 'Uncommon', 'This is a highly sought after, but also fairly uncommon virus. Common names for this virus include, \"Tentacles,\" \"Dreadlocks (dreads),\" \"Ropes,\" and \"Tubes.\" Any scientist worth their salt has a copy of THIS virus in their locker!', 'https://cdn.discordapp.com/attachments/455560809079111690/590925056603979789/unknown.png', '', ''),
(13, 'Size', 'Uncommon', 'This virus is highly sought after, as players love to see their reactions on the massive, towering scale that these beasts have. The size virus makes androids grow anywhere from 1.5x - 6x their size!', 'https://i.gyazo.com/784f7f378056dd516f2562efb160c1ae.png', '', ''),
(15, 'Mafia Boss', 'Unknown', 'The location of this virus is unknown.(To most players.) Even though it is called Mafia Boss Virus in it&#39;s containment, when you store it the name appears as MafiaCity. Injecting the virus will make the android wear a suit and after a while, He&#39;ll even get a fedora to match it. The virus isn&#39;t harmful and is only cosmetic. The virus is a reference to the mobile game Mafia City and the outfit the android wears is very similar to the outfit of the Mafia Boss from the same game.', 'https://cdn.discordapp.com/attachments/590939646784045071/590973700917166095/MBV4.JPG', 'YourBestPalBonnie', 'YourBestPalBonnie'),
(16, 'Color', 'Common', '', 'https://cdn.discordapp.com/attachments/590939646784045071/590978108828680237/Annotation_2019-06-19_145315.jpg', 'Xander_0406', '');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `item_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image_other` text NOT NULL,
  `text_other` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`item_id`, `name`, `image_other`, `text_other`) VALUES
(1, 'Permits', 'https://wisconsindot.gov/Documents/dmv/com-drv-vehs/mtr-car-trkr/72-hour-permit-2010-1.jpg', 'Permits are a new addition to Ro-Bio: Remastered. Permits are an in-game shop item that must be purchased in order to use both the Virus Separator, as well as the Duplicator. '),
(2, 'Themed Lab Coats', 'https://cdn.discordapp.com/attachments/455560809079111690/591022357074804739/unknown.png', 'Ro-Bio: Remastered has also released a new line of themed lab coats available at their group store: https://www.roblox.com/groups/4938377/Ro-Bio-Remastered#!/store');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` char(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Email`, `username`, `Password`) VALUES
(2, 'Sqnsitive', 'tempmail@gmail.com', 'Sqnsitive', 'tempPass'),
(4, 'None', 'notimportant@gmail.com', 'VectusOfArk', 'vecPass'),
(9, 'John', ' bj@gmail.com', 'bonnieJohn', ' bj22'),
(10, 'Zue', ' gmail@gmail.com', 'MrZued', ' tempPass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamestock`
--
ALTER TABLE `gamestock`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `item_id_2` (`item_id`),
  ADD KEY `item_id_3` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamestock`
--
ALTER TABLE `gamestock`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
