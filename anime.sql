-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 10:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--

CREATE DATABASE IF NOT EXISTS `anime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anime`;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `season` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `season`, `image`) VALUES
(1, 'Seasonal Anime', 'Fall 2022', 'https://mfiles.alphacoders.com/673/673165.jpg'),
(2, 'Male Character', 'Fall 2022', 'https://mfiles.alphacoders.com/925/925157.png'),
(3, 'Female Character', 'Fall 2022', 'https://w0.peakpx.com/wallpaper/411/451/HD-wallpaper-anime-anime-girls-touhou-tales-of-series-hatsune-miku-tekken-mika-pikazo-vertical-crossover.jpg'),
(4, 'Couple-Ship', 'Fall 2022', 'https://w0.peakpx.com/wallpaper/345/87/HD-wallpaper-a-silent-voice-aesthetic-anime-couple-cute-koe-no-katachi-love-romance-sky.jpg'),
(5, 'Anime Of The Year', 'Fall 2022', 'https://i.pinimg.com/originals/49/c9/24/49c924b19476f7b1814d131971263237.jpg'),
(6, 'Anime Music', 'Fall 2022', 'https://static.zerochan.net/Yamada.Ryou.%28Bocchi.the.Rock%21%29.full.3778456.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `polls_answers`
--

CREATE TABLE `polls_answers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls_answers`
--

INSERT INTO `polls_answers` (`id`, `user`, `poll`, `choice`) VALUES
(1, 3, 1, 1),
(2, 3, 2, 27),
(3, 3, 3, 37),
(4, 3, 4, 48),
(5, 3, 5, 69),
(6, 3, 6, 80),
(7, 1, 1, 15),
(8, 1, 2, 23),
(9, 1, 3, 38),
(10, 1, 4, 55),
(11, 1, 5, 64),
(12, 1, 6, 82);

-- --------------------------------------------------------

--
-- Table structure for table `polls_choices`
--

CREATE TABLE `polls_choices` (
  `id` int(11) NOT NULL,
  `anime_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `poll` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls_choices`
--

INSERT INTO `polls_choices` (`id`, `anime_name`, `description`, `poll`, `image`) VALUES
(1, 'Chainsaw Man', 'MAPPA', 1, 'https://cdn.myanimelist.net/images/anime/1806/126216.jpg'),
(2, 'Spy x Family Part 2', 'Wit Studio, CloverWorks', 1, 'https://cdn.myanimelist.net/images/anime/1111/127508.jpg'),
(3, 'Blue Lock', '8bit', 1, 'https://cdn.myanimelist.net/images/anime/1258/126929.jpg'),
(4, 'Welcome to Demon School! Iruma-kun S3', 'Bandai Namco Pictures', 1, 'https://cdn.myanimelist.net/images/anime/1688/128720.jpg'),
(5, 'Uzaki-chan Wants to Hang Out! S2', 'ENGI', 1, 'https://cdn.myanimelist.net/images/anime/1539/128058.jpg'),
(6, 'To Your Eternity S2', 'Drive', 1, 'https://cdn.myanimelist.net/images/anime/1271/127700.jpg'),
(7, 'The Eminence in Shadow', 'Nexus', 1, 'https://cdn.myanimelist.net/images/anime/1874/121869.jpg'),
(8, 'Mob Psycho 100 III', 'Bones', 1, 'https://cdn.myanimelist.net/images/anime/1228/125011.jpg'),
(9, 'Beast Tamer', 'EMT Squared', 1, 'https://cdn.myanimelist.net/images/anime/1084/126652.jpg'),
(10, 'Bocchi The Rock!', 'CloverWorks', 1, 'https://cdn.myanimelist.net/images/anime/1448/127956.jpg'),
(11, 'Shinobi no Ittoki', 'TROYCA', 1, 'https://cdn.myanimelist.net/images/anime/1476/125643.jpg'),
(12, 'Reincarnated as a Sword', 'C2C', 1, 'https://cdn.myanimelist.net/images/anime/1191/127909.jpg'),
(13, 'More Than a Married Couple, But Not Lovers', 'studio MOTHER', 1, 'https://cdn.myanimelist.net/images/anime/1713/126442.jpg'),
(14, 'My Hero Academia S6', 'Bones', 1, 'https://cdn.myanimelist.net/images/anime/1483/126005.jpg'),
(15, 'BLEACH: Thousand-Year Blood War', 'Pierrot', 1, 'https://cdn.myanimelist.net/images/anime/1764/126627.jpg'),
(16, 'Kagenou, Cid', 'The Eminence in Shadow', 2, 'https://cdn.myanimelist.net/images/characters/7/461218.jpg'),
(17, 'Kageyama, Shigeo / Mob', 'Mob Psycho 100 III', 2, 'https://cdn.myanimelist.net/images/characters/6/343344.jpg'),
(18, 'Forger, Loid', 'SPY x FAMILY Part II', 2, 'https://cdn.myanimelist.net/images/characters/2/457747.jpg'),
(19, 'Denji', 'Chainsaw Man', 2, 'https://cdn.myanimelist.net/images/characters/3/492407.jpg'),
(20, 'Yamamoto, Shigekuni', 'BLEACH: Thousand-Year Blood War', 2, 'https://cdn.myanimelist.net/images/characters/7/33294.jpg'),
(21, 'Reigen, Arataka', 'Mob Psycho 100 III', 2, 'https://cdn.myanimelist.net/images/characters/16/308364.jpg'),
(22, 'Midoriya, Izuku / Deku', 'My Hero Academia S6', 2, 'https://cdn.myanimelist.net/images/characters/7/299404.jpg'),
(23, 'Kurosaki, Ichigo', 'BLEACH: Thousand-Year Blood War', 2, 'https://cdn.myanimelist.net/images/characters/3/89190.jpg'),
(24, 'Isagi, Yoichi', 'Blue Lock', 2, 'https://cdn.myanimelist.net/images/characters/12/401583.jpg'),
(25, 'Hayakawa, Aki', 'Chainsaw Man', 2, 'https://cdn.myanimelist.net/images/characters/10/492791.jpg'),
(26, 'Yakuin, Jirou', 'More Than a Married Couple, But Not Lovers', 2, 'https://cdn.myanimelist.net/images/characters/5/483449.jpg'),
(27, 'Ekubo / Dimple', 'Mob Psycho 100 III', 2, 'https://cdn.myanimelist.net/images/characters/8/299395.jpg'),
(28, 'Desmond, Damian', 'SPY x FAMILY Part II', 2, 'https://cdn.myanimelist.net/images/characters/4/444772.jpg'),
(29, 'Bakugou, Katsuki', 'My Hero Academia S6', 2, 'https://cdn.myanimelist.net/images/characters/12/299406.jpg'),
(30, 'Suzuki, Iruma', 'Welcome to Demon School! Iruma-kun S3', 2, 'https://cdn.myanimelist.net/images/characters/8/393167.jpg'),
(31, 'Gotou, Hitori', 'Bocchi The Rock!', 3, 'https://cdn.myanimelist.net/images/characters/8/491455.jpg'),
(32, 'Power', 'Chainsaw Man', 3, 'https://cdn.myanimelist.net/images/characters/7/494969.jpg'),
(33, 'Forger, Yor', 'SPY x FAMILY Part II', 3, 'https://cdn.myanimelist.net/images/characters/11/457934.jpg'),
(34, 'Forger, Anya', 'SPY x FAMILY Part II', 3, 'https://cdn.myanimelist.net/images/characters/4/457933.jpg'),
(35, 'Ijichi, Nijika', 'Bocchi The Rock!', 3, 'https://cdn.myanimelist.net/images/characters/16/491305.jpg'),
(36, 'Watanabe, Akari', 'More Than a Married Couple, But Not Lovers', 3, 'https://cdn.myanimelist.net/images/characters/9/483453.jpg'),
(37, 'Yamada, Ryou', 'Bocchi The Rock!', 3, 'https://cdn.myanimelist.net/images/characters/16/491303.jpg'),
(38, 'Makima', 'Chainsaw Man', 3, 'https://cdn.myanimelist.net/images/characters/4/489561.jpg'),
(39, 'Amiya', 'Arknights: PRELUDE TO DAWN', 3, 'https://cdn.myanimelist.net/images/characters/12/493319.jpg'),
(40, 'Lum', 'URUSEI YATSURA (2022)', 3, 'https://cdn.myanimelist.net/images/characters/14/474154.jpg'),
(41, 'Higashiyama, Kobeni', 'Chainsaw Man', 3, 'https://cdn.myanimelist.net/images/characters/13/492210.jpg'),
(42, 'Kita, Ikuyo', 'Bocchi The Rock!', 3, 'https://cdn.myanimelist.net/images/characters/4/493790.jpg'),
(43, 'Himeno', 'Chainsaw Man', 3, 'https://cdn.myanimelist.net/images/characters/3/492411.jpg'),
(44, 'Fran', 'Reincarnated as a Sword', 3, 'https://cdn.myanimelist.net/images/characters/15/489905.jpg'),
(45, 'Usagiyama, Rumi / Mirko', 'My Hero Academia S6', 3, 'https://cdn.myanimelist.net/images/characters/14/363677.jpg'),
(46, 'Jirou x Akari', 'More Than a Married Couple, But Not Lovers', 4, 'https://preview.redd.it/akari-watanabe-jirou-yakuin-episode-2-special-illustration-v0-so8e4jod37u91.jpg?auto=webp&s=3d68002db724bd87a230a7ab5235299efb3d4325'),
(47, 'Ataru x Lum', 'URUSEI YATSURA (2022)', 4, 'https://staticg.sportskeeda.com/editor/2022/10/b29f3-16663752308989-1920.jpg'),
(48, 'Loid x Yor', 'SPY x FAMILY Part II', 4, 'https://ih1.redbubble.net/image.3653833087.2423/fposter,small,wall_texture,product,750x1000.u2.jpg'),
(49, 'Claude x Aileen', 'I\'m the Villainess, so I\'m Taming the Final Boss', 4, 'https://cdn.donmai.us/original/75/5c/755c0387f85bf283f7241cd6698401cc.jpg'),
(50, 'Christopher x Elianna', 'Bibliophile Princess', 4, 'https://64.media.tumblr.com/361f8d88e5e7e4baf48ba7ee475dd88b/7caba2e2d0263ac2-13/s540x810/f5a0741a24a0604f224b77d982e210f313adbd62.jpg'),
(51, 'Gaojun x Shouxue', 'Raven of the Inner Palace', 4, 'https://cdn.donmai.us/original/48/51/__liu_shouxue_and_xia_gaojun_koukyuu_no_karasu_drawn_by_mae10yoko__485113c53fdeec07504a056f9676d805.png'),
(52, 'Damian x Anya', 'SPY x FAMILY Part II', 4, 'https://cdn.donmai.us/sample/56/5c/sample-565cb3e55ede740c7f5df09a45ba782d.jpg'),
(53, 'Izuku x Ochako', 'My Hero Academia S6', 4, 'https://wallpapercave.com/wp/wp3130992.png'),
(54, 'Shinichi x Hana', 'Uzaki-chan Wants to Hang Out! S2', 4, 'https://i1.wp.com/anitrendz.net/news/wp-content/uploads/2021/08/uzakichans2_keyvisual.png?resize=696%2C983&ssl=1'),
(55, 'Ichigo x Orihime', 'BLEACH: Thousand-Year Blood War', 4, 'https://i.pinimg.com/originals/58/0d/b9/580db9fb2a45ced68c8a9e60a8b6a5a1.jpg'),
(56, 'Denji x Makima', 'Chainsaw Man', 4, 'https://i.pinimg.com/564x/5b/4a/f0/5b4af080ac2a7dd86675e0fc9e8126a3.jpg'),
(57, 'Ryou x Ikuyo', 'Bocchi The Rock!', 4, 'https://static.zerochan.net/Bocchi.The.Rock%21.full.3792430.jpg'),
(58, 'Iruma x Amelie', 'Welcome to Demon School! Iruma-kun S3', 4, 'https://i.ytimg.com/vi/_wI_EBaGdQU/maxresdefault.jpg'),
(59, 'Denki x Kyouka', 'My Hero Academia S6', 4, 'https://wallpapercave.com/wp/wp5055528.jpg'),
(60, 'Shigeo x Tsubomi', 'Mob Psycho 100 III', 4, 'https://static.zerochan.net/Mob.Psycho.100.full.2060413.jpg'),
(61, 'Akebi\'s Sailor Uniform', 'CloverWorks', 5, 'https://cdn.myanimelist.net/images/anime/1820/120520.jpg'),
(62, 'Call of the Night', 'LIDENFILMS', 5, 'https://cdn.myanimelist.net/images/anime/1045/123711.jpg'),
(63, 'Lycoris Recoil', 'A-1 Pictures', 5, 'https://cdn.myanimelist.net/images/anime/1392/124401.jpg'),
(64, 'Ranking of Kings', 'Wit Studio', 5, 'https://cdn.myanimelist.net/images/anime/1347/117616.jpg'),
(65, 'Spy x Family', 'Wit Studio, CloverWorks', 5, 'https://cdn.myanimelist.net/images/anime/1441/122795.jpg'),
(66, 'Tomodachi Game', 'Okuruto Noboru', 5, 'https://cdn.myanimelist.net/images/anime/1247/121345.jpg'),
(67, 'Attack on Titan Final Season Part II', 'MAPPA', 5, 'https://cdn.myanimelist.net/images/anime/1948/120625.jpg'),
(68, 'Classroom of the Elite II', 'Lerche', 5, 'https://cdn.myanimelist.net/images/anime/1010/124180.jpg'),
(69, 'Kaguya-sama: Love Is War -Ultra Romantic-', 'A-1 Pictures', 5, 'https://cdn.myanimelist.net/images/anime/1160/122627.jpg'),
(70, 'My Dress-Up Darling', 'CloverWorks', 5, 'https://cdn.myanimelist.net/images/anime/1179/119897.jpg'),
(71, 'SHADOWS HOUSE S2', 'CloverWorks', 5, 'https://cdn.myanimelist.net/images/anime/1634/124231.jpg'),
(72, 'Summer Time Rendering', 'OLM', 5, 'https://cdn.myanimelist.net/images/anime/1120/120796.jpg'),
(73, 'Vinland Saga S2', 'MAPPA', 5, 'https://cdn.myanimelist.net/images/anime/1170/124312.jpg'),
(74, 'Dr. Stone', 'TMS Entertainment', 5, 'https://cdn.myanimelist.net/images/anime/1071/124921.jpg'),
(75, 'Bocchi The Rock!', 'CloverWorks', 5, 'https://cdn.myanimelist.net/images/anime/1448/127956.jpg'),
(76, 'Prism', 'AmPm, Miyuna', 6, ''),
(77, 'DADDY! DADDY! DO!', 'Masayuki Suzuki, Airi Suzuki', 6, ''),
(78, 'Chiisana Hibi', 'flumpool', 6, ''),
(79, 'New Genesis', 'Ado', 6, ''),
(80, 'Shinkai', 'eve', 6, ''),
(81, 'A Cruel Angel\'s Thesis', 'Shiro Sagisu, Yoko Takahashi', 6, ''),
(82, 'Hero\'s Come back!', 'nobodyknows+', 6, ''),
(83, 'Inferno', 'Mrs. Green Apple', 6, ''),
(84, 'Comedy', 'Gen Hoshino ', 6, ''),
(85, 'Homura', 'LiSA', 6, ''),
(86, 'Hero too', 'Kyoko Jiro / Chrissy Costanza', 6, ''),
(87, 'Blue Bird', 'Ikimonogakari', 6, ''),
(88, 'Again', 'Yui', 6, ''),
(89, 'Ashiato -Footprints -', 'the peggies', 6, ''),
(90, 'Sugar Song To Bitter Step', 'Unison Square Garden', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `type`, `username`, `password`) VALUES
(1, 'Jaydee', 'Ballaho', 'admin', 'jaydee', 'jaydee'),
(2, 'Root', 'Root', 'admin', 'root', 'root'),
(3, 'Natsu', 'Dragneel', 'user', 'natsu', 'natsu'),
(4, 'Erza', 'Scarlet', 'user', 'erza', 'erza'),
(5, 'Khasmir', 'Basaluddin', 'user', 'khasmir', 'khasmir'),
(6, 'Kent', 'Evangelista', 'user', 'kent', 'kent'),
(7, 'Bennett', 'Chan', 'user', 'bennett', 'bennett'),
(8, 'Lucy', 'Felix', 'user', 'lucy', 'lucy'),
(9, 'Rob', 'Villanueva', 'user', 'rob', 'rob');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_answers`
--
ALTER TABLE `polls_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_choices`
--
ALTER TABLE `polls_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `polls_answers`
--
ALTER TABLE `polls_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `polls_choices`
--
ALTER TABLE `polls_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
