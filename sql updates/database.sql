-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 05:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepler`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles`
--

CREATE TABLE `cms_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` tinytext DEFAULT NULL,
  `image` text NOT NULL,
  `title` tinytext NOT NULL,
  `short_text` text NOT NULL,
  `long_text` mediumtext NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_override` tinytext DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_articles`
--

INSERT INTO `cms_articles` (`id`, `url`, `image`, `title`, `short_text`, `long_text`, `author_id`, `author_override`, `publish_date`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1_a', 'topstory_summer_1.gif', 'a', 'b', '<p>c</p>', 1, NULL, '2025-03-28 22:43:51', '0', '2025-03-28 22:43:51', '2025-04-04 17:45:26'),
(2, '2_a', 'avengers2_topstory2.gif', 'a', 'b', '<p>c</p>', 1, NULL, '2025-03-28 23:31:58', '0', '2025-03-28 23:22:18', '2025-04-04 17:45:10'),
(3, '3_asd', 'top_stories_battle_ball.gif', 'asd', 'asd', '<p>fsd</p>', 1, 'asd', '2025-03-28 23:32:32', '0', '2025-03-28 23:32:32', '2025-04-04 17:45:03'),
(4, '4_title', 'treasure_hunt.gif', 'Title', 'Short Story\r\nA small introduction to the article.\r\nHTML is not allowed here.', '<p><strong style=\"font-family: \'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Arial, Verdana, \'Trebuchet MS\'; user-select: text !important;\">Story</strong></p>\r\n<div class=\"graytext\" style=\"font-family: \'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Arial, Verdana, \'Trebuchet MS\';\">The actual news message.<br />HTML is allowed here.</div>', 1, 'Author Override', '2025-03-29 11:40:00', '1', '2025-03-28 23:34:41', '2025-04-04 17:44:56'),
(5, '5_teste', 'Kedo_Luna_Verify.gif', 'teste', 'asd asd', '<p>asd asd a sad</p>', 1, 'asdasd', '2025-03-29 19:49:38', '1', '2025-03-29 19:49:38', '2025-04-04 17:44:47'),
(6, '6_a', 'dudesons_invade.gif', 'a', 'asd', '<p>asd</p>', 1, 'asd', '2025-04-01 16:55:31', '0', '2025-04-01 16:55:31', '2025-04-09 14:29:58'),
(7, '7_a', 'Xmas_topstory.gif', 'a', 'asd', '<p>asd</p>', 1, 'asd', '2025-04-01 16:55:48', '0', '2025-04-01 16:55:48', '2025-04-04 17:44:23'),
(8, '8_a', 'TopStories_credits.gif', 'a', 'asd', '<p>asd</p>', 1, 'asd', '2025-04-01 16:55:52', '0', '2025-04-01 16:55:52', '2025-04-04 17:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `cms_boxes`
--

CREATE TABLE `cms_boxes` (
  `id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `content` mediumtext NOT NULL,
  `requirement` enum('auth','guest','both') NOT NULL DEFAULT 'both',
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_boxes`
--

INSERT INTO `cms_boxes` (`id`, `title`, `content`, `requirement`, `created_by`) VALUES
(1, 'New to Habbo?', '<p><span style=\"font-weight: bold;\">This is how you do it!</span><br /><br /></p>\n<div align=\"center\"><img src=\"%url%/web/images/hotel/one.gif\" alt=\"\" width=\"184\" /><br /> <a href=\"https://get.adobe.com/flashplayer\" target=\"_blank\">Download Flash to play!</a> <br /> <img src=\"%url%/web/images/hotel/two.gif\" alt=\"\" width=\"184\" /><br /> <a onclick=\"openOrFocusHabbo(this); return false;\" href=\"%url%/client\" target=\"client\">Check into Habbo Hotel!</a><br /> It\'s FREE!<br /> <img src=\"%url%/web/images/hotel/three.gif\" alt=\"\" width=\"184\" /><br /> Create your Habbo! <br /> <img src=\"%url%/web/images/hotel/four.gif\" alt=\"\" width=\"184\" /><br /> <a href=\"%url%/hotel/navigator\">Use the navigator to explore</a> <br /> <img src=\"%url%/web/images/hotel/screenies_rev.gif\" alt=\"\" width=\"184\" /><br /> <a onclick=\"openOrFocusHabbo(this); return false;\" href=\"%url%/client\" target=\"client\">Make some friends &amp; have fun!</a></div>', 'both', 1),
(2, 'Welcome to Habbo!', '<p>Habbo is a teen community where you can meet friends, play games and make your own home online. It\'s <span style=\"font-weight: bold;\">FREE</span> to join so what are you waiting for? <br /> <a href=\"%url%/login\"> <img src=\"%url%/web/images/pages/index/hotelmans_nosd.png\" alt=\"\" align=\"right\" border=\"0\" hspace=\"2\" vspace=\"5\" /></a> <br /> <a href=\"%url%/login\">Make your Habbo - it\'s free!</a> <br /><br /> Not sure what to do?<br /><a href=\"%url%/hotel\">Find out more!</a><br /><br /></p>', 'guest', 1),
(3, 'Example box', '<p>This is an example box. You can create or edit this one clicking&nbsp;<a href=\"%url%/housekeeping/site/boxes/edit/3\">here.</a></p>', 'both', 1),
(4, 'Habbo E-Cards', '<p><a href=\"https://web.archive.org/web/20071127203114/http://213.157.69.169/bodylanguage/us/main.php\" target=\"_blank\"><img id=\"galleryImage\" src=\"%url%/web/images/hotel/Thumbs_52x41.gif\" alt=\"Thumbs 100x81\" width=\"52\" height=\"41\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" /></a>Tell all your friends and fellow Habbos how you feel about them.<br /><br />Send out a <a href=\"https://web.archive.org/web/20071127203114/http://213.157.69.169/bodylanguage/us/main.php\" target=\"_blank\">Habbo Body Language</a> e-card today!</p>', 'both', 1),
(5, 'Links to get you started!', '<center><img src=\"%url%/web/images/hotel/help_and_safety_004.gif\" alt=\"\" /></center>\r\n<ul>\r\n<li><a href=\"%url%/hotel/welcome_to_habbo_hotel/how_to_get_started\">New? Get started!</a></li>\r\n<li><a href=\"%url%/credits\">Habbo Coins</a></li>\r\n<li><a href=\"%url%/hotel/web\">HabboWeb</a></li>\r\n<li><a href=\"%url%/credits/furniture\">Habbo Furni</a></li>\r\n<li><a href=\"%url%/hotel/homes\">Make a Homepage</a></li>\r\n<li><a href=\"%url%/games\">Play Games</a></li>\r\n<li><a href=\"%url%/hotel/pets/\" target=\"_self\">Habbo Pets</a></li>\r\n</ul>', 'both', 1),
(6, 'The Icons of Habbo', '<p>Not entirely sure what the little icons inside the hotel means?<br /><br /></p>\r\n<table id=\"table1\" width=\"100%\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td><span style=\"font-weight: bold;\">The Console</span><br />Keep in touch with your friends - and find new ones in the hotel!<br /><br /></td>\r\n<td><span style=\"font-weight: bold;\"><img src=\"%url%/web/images/hotel/news_icon_02.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"5\" /></span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-weight: bold;\">The Purse</span><br />Keeps your coins safe<br /><br /></td>\r\n<td><span style=\"font-weight: bold;\"><img src=\"%url%/web/images/hotel/news_icon_03.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"5\" /></span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-weight: bold;\">Navigator</span><br /> Stuck in a room with a lame dude? Click away with the navigator!<br /><br /></td>\r\n<td><span style=\"font-weight: bold;\"><img src=\"%url%/web/images/hotel/navigator_icon.png\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"5\" /></span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-weight: bold;\">Getting troubled?</span><br />Ask a moderator for help!<br /><br /></td>\r\n<td><span style=\"font-weight: bold;\"><img src=\"%url%/web/images/hotel/hvimage6.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"5\" /></span></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Catalog</strong><br />Everything that\'s on sale - in one place!<br /><br /></td>\r\n<td><img src=\"%url%/web/images/hotel/news_icon_01.gif\" alt=\"\" align=\"right\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'both', 1),
(7, 'Habbo Club', '<p><a href=\"%url%/club/\" target=\"_self\"><img src=\"%url%/web/images/credits/hc_badge.gif\" alt=\"\" width=\"33\" height=\"39\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" /></a>Join <a href=\"%url%/club/\" target=\"_self\">Habbo Club</a>, the VIP members-only club, and enjoy all kinds of exclusive room layouts, furni, priority access, and cool clothes!<br /><br />All for just 30 <a href=\"%url%/credits/\" target=\"_self\">Credits</a> a month!</p>', 'both', 1),
(8, 'Love Games??', '<p><a style=\"font-weight: bold;\" href=\"%url%/games/\" target=\"_self\"> <img src=\"%url%/web/images/hotel/battleball.gif\" alt=\"\" align=\"left\" border=\"0\" hspace=\"5\" vspace=\"0\" /> </a> <span style=\"font-weight: bold;\">You\'re in the right place!<br /></span> Check out these COOL games:<br /><br /> <a href=\"%url%/games/dive/\" target=\"_self\">High Dive</a> <br /> <a href=\"%url%/games/wobblesquabble/\" target=\"_self\">Wobble Squabble</a> <br /> <a href=\"%url%/games/battleball/\" target=\"_self\">Battle Ball Challenge</a> <br /> <a href=\"%url%/games/snowstorm\">SnowStorm</a> <br /><br />There\'s also <strong>Chess</strong>, <strong>Poker</strong> or <strong>Battle Ships</strong> in the Cunning Fox Gamehall!</p>', 'both', 1),
(9, 'Hotel Safety', '<p><a href=\"%url%/help/\" target=\"_self\"> <img src=\"%url%/web/images/hotel/HabboX_2.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" /> </a> We care about your safety while in the Hotel: go to our <a href=\"%url%/help/\" target=\"_self\">Help and Safety</a> pages to read up on how to keep your account safe. If you are new to Habbo Hotel please read our <a href=\"%url%/hotel/welcome_to_habbo_hotel/help_safety\" target=\"_self\">Welcome</a> pages.</p>', 'both', 1),
(10, 'Habbo Credits', '<p><img src=\"%url%/web/images/credits/habbos_w_credits.gif\" alt=\"\" align=\"right\" /><a href=\"%url%/credits/\" target=\"_self\">Habbo Credits</a> allow you to decorate your room with Habbo <a href=\"%url%/hotel/furniture/\" target=\"_self\">Furni</a>, buy gifts for your friends, join <a href=\"%url%/club/\" target=\"_self\">Habbo Club</a> play <a href=\"%url%/games/battleball/\" target=\"_self\">Battle Ball</a> and more!</p>', 'both', 1),
(11, 'Adopt a Pet', '<p><img id=\"galleryImage\" src=\"%url%/web/images/credits/Bushy_woofer_small.gif\" alt=\"\" width=\"38\" height=\"33\" align=\"right\" border=\"0\" />Have you gotten yourself a <a href=\"%url%/hotel/pets/\" target=\"_self\">Pet</a> yet? They\'re cute, cuddly and nearly capable of scaring away intruders!</p>', 'both', 1),
(12, 'Habbo Furni', '<p><img id=\"galleryImage\" src=\"%url%/web/images/hotel/news_icon_01.gif\" alt=\"\" width=\"36\" height=\"36\" align=\"right\" border=\"0\" />Habbo Furni can be used to decorate rooms, make mazes, games, lost cities of gold and even really big toilets!</p>\r\n<p>Browse our online <a href=\"%url%/hotel/furniture/\" target=\"_self\">Catalogue</a> to find out more about Habbo Furni and what you can do with it!</p>', 'both', 1),
(13, 'Crocodiles - NEW!', '<p><img src=\"%c_images%/album1774/croc17.png\" alt=\"\" align=\"right\" hspace=\"5\" />A Crocodile - every Habbo\'s dream (or nightmare!) Learn how lovable and cute a croc can truly be!</p>', 'both', 1),
(14, 'Cats', '<p><img src=\"%c_images%/album923/news_icon_14a.gif\" alt=\"\" align=\"right\" hspace=\"5\" />We like the cats, the cats that go \"mew\". Cute and cuddly with a furry tail that wiggles when starved for attention.</p>', 'both', 1),
(15, 'Dogs', '<p><img src=\"%c_images%/album923/news_icon_14b.gif\" alt=\"\" align=\"right\" hspace=\"5\" />Dogs are fairly useless at guarding your room, but their friendly bark is as much fun as their bite.</p>', 'both', 1),
(16, 'New To Habbo?', '<p>1. <a title=\"Get Flash\" href=\"https://get.adobe.com/flashplayer\" target=\"_blank\">Get Flash</a> (it\'s free)<br /> 2. <a onclick=\"openOrFocusHabbo(this); return false;\" href=\"%url%/client\" target=\"client\">Enter Habbo Hotel</a><br /> 3. Create your Habbo and play!<br /><br /></p>', 'both', 1),
(17, 'Joining a Group', '<p>Joining a group is free, so what are you waiting for?<br /><br /><img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Log in (or <a href=\"https://web.archive.org/web/20070702072656/http://www.habbo.com/login\">register</a>)</p>\n<div class=\"groups-toplist-sidebar\"><img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Browse the <a href=\"%url%/groups/directory/\">Directory</a><br /> <img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Click a Group\'s name<br /> <img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Join!</div>', 'both', 1),
(18, 'Creating your own Group', '<p>Create your own Group for just 10 Habbo Credits:<br /><br /><img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Log in (or <a href=\"https://web.archive.org/web/20070702072656/http://www.habbo.com/login\">register</a>)</p>\n<div class=\"groups-toplist-sidebar\"><img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Create your Group<br /> <img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Make the Group badge<br /> <img src=\"%c_images%/unsorted/golden_star.gif\" alt=\"\" /> Invite your friends!</div>', 'both', 1),
(19, 'Habbo Club Shop', '<p><img src=\"%url%/web/images/club/club_gift.gif\" alt=\"\" align=\"middle\" border=\"0\" hspace=\"5\" vspace=\"5\" /><br />Welcome to the Habbo Club shop, where members get the chance to buy furni that other Habbos can\'t.</p>', 'both', 1),
(20, 'Calls For Help', '<p><img src=\"%url%/web/images/help/404_G.gif\" alt=\"\" align=\"right\" />If you are worried about something - maybe you\'ve just seen someone break the <a href=\"%url%/help/habbo_way\" target=\"_self\">Habbo Way</a> - you can &lsquo;Call For Help&rsquo;, by clicking on the blue question mark in the bottom right corner of your screen when you\'re logged into Habbo.</p>\r\n<p>A Moderator will then either send you a message or come and see you.<br /> <br /> <strong>The \'Call for Help\' is Habbo Hotel\'s \'911\' service - please only use it in emergencies. </strong></p>', 'both', 1),
(21, 'How do I...?', '<p>To find out how to use your Habbo Home and make it look shiny, fabby and aesthetically pleasing in a strange and forgivable way you need to read our instructions.<br /><br /><a href=\"%url%/hotel/homes\" target=\"_self\">Habbo Homes Instructions</a></p>', 'both', 1),
(22, 'Looking for someone?', '<p><img src=\"%c_images%/stickers/nail2.gif\" alt=\"\" align=\"left\" border=\"0\" hspace=\"3\" vspace=\"3\" />To find your friend\'s Habbo Home, just add their Habbo name in the URL.<br /><br />For example:<br /><br /><span style=\"font-weight: bold;\">%url%/home/x</span></p>', 'both', 1),
(23, 'Habbo Credits', '<p><img src=\"%url%/web/images/common/habbo_purse_big_64.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"5\" />Habbo Credits: they are great. <br /><br />You can buy new stickers and backgrounds for your Habbo Home with them!<br /><br /><a href=\"%url%/credits\" target=\"_self\">More about Habbo Credits</a></p>', 'both', 1),
(26, 'Help Section', '<p><img src=\"%c_images%/album1242/safety_197.gif\" alt=\"\" /><br /> In this section, you can find out how to keep your Habbo safe as well as find out about the many features of Habbo.</p>', 'both', 1),
(27, 'How do I?', '<p>Need help? Get answers to questions like these in our <a href=\"%url%/help/faqs/\" target=\"_self\">FAQs</a>:</p>\r\n<ul>\r\n<li>Is Habbo Hotel free?</li>\r\n<li>Why can\'t I get in?</li>\r\n<li>Why am I banned?</li>\r\n<li><a href=\"%url%/help/hotel_way\" target=\"_self\">What are the rules?</a></li>\r\n</ul>', 'both', 1),
(28, 'Account Security', '<p>Make sure no one steals your stuff - learn how to <a href=\"%url%/help/account_security\" target=\"_self\">keep your Habbo accounts secure</a><a href=\"#\">.</a></p>', 'both', 1),
(29, 'Staying Safe', '<p>Your safety is really important to us - make sure you read our <a href=\"%url%/help/safety_tips\" target=\"_self\">Safety Tips</a> before you play.</p>', 'both', 1),
(30, 'Contact Us', '<p>Need to ask us something? Use our shiny Habbo Help Tool to <a title=\"Habbo Help Tool\" href=\"%url%/help/contact_us\" target=\"_blank\">email us</a>.<br /><img src=\"%url%/web/images/iot/help_main.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"0\" /><br />You can also use the <a href=\"%url%/help/contact_us\" target=\"_blank\">Help Tool</a> to find out your banning status, reset your password and search our FAQs.<br /><br /></p>', 'both', 1),
(31, 'Featured Fansites', '<p><img id=\"galleryImage\" src=\"%c_images%/album238/whos_online.gif\" alt=\"whos online\" width=\"35\" height=\"42\" align=\"right\" border=\"0\" hspace=\"0\" vspace=\"0\" /> We\'re revamping the Official Habbo USA Fansites, so make sure to check out the Fansites page to see how to make your Fansite Official! <a href=\"%url%/community/fansites\" target=\"_self\">Find out more...</a></p>', 'both', 1),
(32, 'FAQs', '<p><img src=\"%c_images%/album155/questionmark.gif\" alt=\"\" align=\"left\" hspace=\"5\" />Need help? Check out the <a href=\"%url%/help/faqs\">FAQs</a> for answers and support.</p>', 'both', 1),
(33, 'Games Section', '<p><img src=\"%c_images%/album1242/games_197.gif\" alt=\"\" border=\"0\" vspace=\"0\" /></p>\n<p>You can find out about all the games in Habbo here. From Wobble Squabble, Freefall Dive to Battle Ball, you\'ll find it here.</p>', 'both', 1),
(34, 'Game Tickets', '<p><img src=\"%url%/web/images/credits/habbos_w_credits.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" />To play Battle Ball, Wobble Squabble or Diving you need Game Tickets which can be purchased from game rooms with <a href=\"%url%/credits/\" target=\"_self\">Habbo Coins</a>.</p>\n<p>Habbo Coins allow you to decorate your room, buy gifts for your friends, join <a href=\"%url%/club/\" target=\"_self\">Habbo Club</a>, play <a href=\"%url%/games/battleball/\" target=\"_self\">Battle Ball</a>, go <a href=\"%url%/games/dive/\" target=\"_self\">Diving</a> and more!</p>', 'both', 1),
(35, 'Battle Ball', '<p><img id=\"galleryImage\" src=\"%c_images%/album372/2players_1.gif\" alt=\"\" width=\"55\" height=\"53\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" /><span style=\"font-weight: bold;\">&nbsp;</span>An intense game of strategy, skill and speed. Do you have what it takes to bounce your way to glory, take the arena and be a <a href=\"%url%/games/battleball/\" target=\"_self\">Battle Ball </a>champion?</p>', 'both', 1),
(36, 'Wobble Squabble', '<p><img src=\"%url%/web/images/pages/games/ws_gfx01.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" />A two player game of balance where even the slightest move can win or lose you the entire game! In <a href=\"%url%/games/wobblesquabble/\" target=\"_self\">Wobble Squabble</a> you have to slap and nudge your opponent until they fall off the inflatables and land in the pool.</p>', 'both', 1),
(37, 'Diving', '<p><span style=\"font-weight: bold;\">&nbsp;</span><img src=\"%c_images%/album346/habbokick.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"5\" vspace=\"0\" />Have you got a head for heights? It\'s a long way down... dare you take the <a href=\"%url%/games/dive/\" target=\"_self\">plunge</a>?</p>', 'both', 1),
(38, 'House Rules', '<p>Habbo Hotel is a place where people come to relax, hang out and make new friends in a safe, non-threatening environment. Our House Rules, known as the Habbo Way, are very simple. Stick to them and you\'ll have fun; break them and you\'ll get yourself banned.</p>', 'both', 1),
(39, 'More information', '<p>Habbo Hotel reserves the right to use any means, whether technical or human, to uphold our <a href=\"%url%/footer_pages/terms_and_conditions\" target=\"_self\">Terms and Conditions</a> (and the Habbo Way). The Habbo Hotel management also reserves the right to refuse admission and may report anyone who breaks the law to the authorities (yes, that means the police).</p>\r\n<p>&nbsp;</p>\r\n<p>Please read our full <a href=\"%url%/footer_pages/terms_and_conditions\" target=\"_self\">Terms and Conditions</a> by clicking here. If you are under 18, you must make sure your parents read them too.</p>', 'both', 1),
(40, 'Instant Help!', '<p>The <a href=\"%url%/iot/go\" target=\"_blank\">Habbo Help Tool</a> isn\'t just for emailing us - it also gives you instant answers!<br /><br /><span style=\"font-weight: bold;\">Forgotten your password?</span> <br />Use the <a href=\"%url%/iot/go\" target=\"_blank\">Help Tool</a> to get a new one now.<br /><br /><span style=\"font-weight: bold;\">Been banned?</span> <br />Use the <a href=\"%url%/iot/go\" target=\"_blank\">Help Tool</a> to find out how long you are out of the game for.</p>', 'both', 1),
(41, 'Welcome to Habbo!', '<p>Hello %username%!<br /><br /></p>', 'auth', 1),
(42, 'The Challenge', '<img width=\"22\" hspace=\"0\" height=\"47\" border=\"0\" align=\"right\" id=\"galleryImage\" src=\"%c_images%/common/rares_trophy_3.gif\" alt=\"\">Do you have what it takes to become an Ultimate Bouncer? A champion and a Habbo legend... Can you stay in the top 10 and try to take home the coveted Gold Dragon? If you think you\'ve got the skill and the stamina, read on!… <a href=\"%url%/games/battleball/challenge\" target=\"_self\">More Info. </a>', 'both', 1),
(43, 'Highscores', '<img hspace=\"3\" border=\"0\" align=\"right\" src=\"%c_images%/album770/winner.gif\" alt=\"\">Do you have what it takes to become an Ultimate Bouncer? A champion and a Habbo legend... Can you stay in the top 10 and take home the coveted Gold Dragon? If you think you\'ve got the skill and stamina read on!… <a href=\"%url%/games/battleball/high_scores\" target=\"_self\">More Info. </a>', 'both', 1),
(44, 'Highscores', '<img width=\"22\" hspace=\"0\" height=\"47\" border=\"0\" align=\"right\" id=\"galleryImage\" src=\"%c_images%/common/rares_trophy_3.gif\" alt=\"\">Do you have what it takes to become the best Snowstormer? A champion and a Habbo legend... Can you stay in the top 20 and take home the awesome Snowstorm Badge? If you think you\'ve got the skill and stamina read on!… <a href=\"%url%/games/snowstorm/highscores\" target=\"_self\">More Info. </a>', 'both', 1),
(45, 'High Scores', '<img hspace=\"3\" border=\"0\" align=\"left\" src=\"%c_images%/album770/winner.gif\" alt=\"\">Have you made the Top 10? Click here to find out! ', 'both', 1),
(46, 'Beats Drop', '<img src=\"%c_images%/album1280/Traxshop_image_01_001.gif\" alt=\"\"><br><br>Your one stop shop for all your Trax needs!<br><br><a href=\"%url%/hotel/trax/store/\" target=\"_self\">Visit the TraxStore &gt;&gt;</a><br>', 'both', 1),
(47, 'In Sounds from Way Out', '<img vspace=\"10\" hspace=\"1\" border=\"0\" align=\"top\" src=\"%c_images%/album2304/tm_dancing_habbos_001.gif\" alt=\"\"> <span style=\"font-weight: bold;\"><br>Introducing the dawn of a new Habbo era... From out of the silence, we bring you Habbo Trax, putting the power in your hands to fill the hotel with sound!<br><br></span>Take your room into the next dimension today with a Traxmachine. Get yours for <span style=\"font-weight: bold;\">only 10 Habbo Coins</span>, with a free Traxpack.<br><br><br><a target=\"_self\" href=\"%url%/hotel/trax/store/\">Visit the TraxStore &gt;&gt;</a><br>', 'both', 1),
(48, 'Become a Trax Master!', 'Take our Trax Masterclasses:<br><p><img vspace=\"0\" hspace=\"0\" border=\"0\" align=\"bottom\" src=\"%c_images%/album2063/trax_bullet_orange.gif\" alt=\"\"> <a href=\"%url%/hotel/trax/masterclass\" target=\"_self\">The Basics</a><br><img vspace=\"0\" hspace=\"0\" border=\"0\" align=\"bottom\" src=\"%c_images%/album2063/trax_bullet_magenta.gif\" alt=\"\">\r\n<a href=\"%url%/hotel/trax/masterclass/hiphop\" target=\"_self\">Hip-Hop</a><br>\r\n<img vspace=\"0\" hspace=\"0\" border=\"0\" align=\"bottom\" src=\"%c_images%/album2063/trax_bullet_green.gif\" alt=\"\"> <a href=\"%url%/hotel/trax/masterclass/rock\" target=\"_self\">Rock &amp; Heavy</a></p>', 'both', 1),
(49, 'Traxmachine', '<div align=\"center\"><img src=\"%c_images%/album1280/soundmachine1.png\" alt=\"\"><br>Get the music bumpin\' in all your rooms with <b>extra Traxmachines!</b>\r\n\r\n<p></p><div id=\"purchase_1\" class=\"purchase-component\">\r\nTraxMachine Starter Pack costs 10 coins. To get more coins, please visit the <a href=\"%url%/credits\">Coin pages</a><br>\r\n<span id=\"purchase_1_purchase\"></span>\r\n<script language=\"JavaScript\">\r\nvar purchaseButton = Builder.node(\"a\", {href:\"#\", className:\"colorlink orange\"}, [ Builder.node(\"span\", \"Purchase\") ]);\r\n$(\"purchase_1_purchase\").appendChild(purchaseButton);\r\nEvent.observe(purchaseButton, \"click\", function(e) {\r\n    Event.stop(e);\r\n    var dialog = Dialog.createDialog(\"purchase_dialog\", \"Confirm purchase\", 9001, 0, -1000, closePurchase);\r\n    Dialog.appendDialogBody(dialog, \"<p style=\\\"text-align:center\\\"><img src=\\\"%url%/web/images/progress_bubbles.gif\\\" alt=\\\"\\\" width=\\\"29\\\" height=\\\"6\\\" /></p><div style=\\\"clear\\\"></div>\", true);\r\n    Dialog.moveDialogToCenter(dialog);\r\n    Overlay.show();\r\n	new Ajax.Request(\r\n		habboReqPath + \"/furnipurchase/purchase_confirmation\",\r\n		{ method: \"post\", parameters: \"product=\"+encodeURIComponent(\"sound_machine_deal\"), onComplete: function(req, json) {\r\n			Dialog.setDialogBody(dialog, req.responseText);\r\n		} }\r\n	);\r\n}, false);\r\n</script>\r\n\r\n\r\n</div><p></p></div>', 'both', 0),
(50, 'Sounds Like Habbo', '<img vspace=\"10\" hspace=\"10\" border=\"0\" align=\"left\" src=\"%c_images%/album2304/tm_dancing_habbos_001.gif\" alt=\"\"> <span style=\"font-weight: bold;\"><br></span>Take your room into the next dimension today with a Traxmachine. Take advantage of our introductory offer of <span style=\"font-weight: bold;\">only 10 Habbo Coins</span>, with a free Traxpack.<span style=\"font-weight: bold;\"></span><br><div id=\"purchase_2\" class=\"purchase-component\">\r\n\r\n\r\n\r\n\r\nTraxMachine Starter Pack costs 10 coins. To get more coins, please visit the <a href=\"%url%/credits\">Coin pages</a><br>\r\n<span id=\"purchase_2_purchase\"></span>\r\n<script language=\"JavaScript\">\r\nvar purchaseButton = Builder.node(\"a\", {href:\"#\", className:\"colorlink orange\"}, [ Builder.node(\"span\", \"Purchase\") ]);\r\n$(\"purchase_2_purchase\").appendChild(purchaseButton);\r\nEvent.observe(purchaseButton, \"click\", function(e) {\r\n    Event.stop(e);\r\n    var dialog = Dialog.createDialog(\"purchase_dialog\", \"Confirm purchase\", 9001, 0, -1000, closePurchase);\r\n    Dialog.appendDialogBody(dialog, \"<p style=\\\"text-align:center\\\"><img src=\\\"%url%/web/images/progress_bubbles.gif\\\" alt=\\\"\\\" width=\\\"29\\\" height=\\\"6\\\" /></p><div style=\\\"clear\\\"></div>\", true);\r\n    Dialog.moveDialogToCenter(dialog);\r\n    Overlay.show();\r\n	new Ajax.Request(\r\n		habboReqPath + \"/furnipurchase/purchase_confirmation\",\r\n		{ method: \"post\", parameters: \"product=\"+encodeURIComponent(\"sound_machine_deal\"), onComplete: function(req, json) {\r\n			Dialog.setDialogBody(dialog, req.responseText);\r\n		} }\r\n	);\r\n}, false);\r\n</script>\r\n\r\n\r\n</div>', 'both', 0),
(51, 'Big Deal', '<p align=\"center\">\r\n<img src=\"%c_images%/album2063/Trax_carrying_guy.gif\" alt=\"\"></p><span style=\"font-weight: bold;\">Heavy Mosh Deal</span><br>This deal will help you rock out in fatalistic style: Snotty Day, Moshy Metal Traxpacks + an empty spinning bottle<p></p><div id=\"purchase_3\" class=\"purchase-component\">\r\n\r\nRock &amp; Heavy Masterclass Traxpacks Deal costs 10 coins. To get more coins, please visit the <a href=\"%url%/credits\">Coin pages</a><br>\r\n<span id=\"purchase_3_purchase\"></span>\r\n<script language=\"JavaScript\">\r\nvar purchaseButton = Builder.node(\"a\", {href:\"#\", className:\"colorlink orange\"}, [ Builder.node(\"span\", \"Purchase\") ]);\r\n$(\"purchase_3_purchase\").appendChild(purchaseButton);\r\nEvent.observe(purchaseButton, \"click\", function(e) {\r\n    Event.stop(e);\r\n    var dialog = Dialog.createDialog(\"purchase_dialog\", \"Confirm purchase\", 9001, 0, -1000, closePurchase);\r\n    Dialog.appendDialogBody(dialog, \"<p style=\\\"text-align:center\\\"><img src=\\\"%url%/web/images/progress_bubbles.gif\\\" alt=\\\"\\\" width=\\\"29\\\" height=\\\"6\\\" /></p><div style=\\\"clear\\\"></div>\", true);\r\n    Dialog.moveDialogToCenter(dialog);\r\n    Overlay.show();\r\n	new Ajax.Request(\r\n		habboReqPath + \"/furnipurchase/purchase_confirmation\",\r\n		{ method: \"post\", parameters: \"product=\"+encodeURIComponent(\"rock_masterclass_deal\"), onComplete: function(req, json) {\r\n			Dialog.setDialogBody(dialog, req.responseText);\r\n		} }\r\n	);\r\n}, false);\r\n</script>\r\n\r\n\r\n</div><p></p><p><span style=\"font-weight: bold;\">Hip Hop</span><br>Don\'t stop \'til you enough with this awesome deal: 4 Traxpacks and a Mode Minibar.</p><p></p><div id=\"purchase_4\" class=\"purchase-component\">\r\n\r\n\r\n\r\n\r\nHip-Hop Masterclass Trax packs Deal costs 20 coins. To get more coins, please visit the <a href=\"%url%/credits\">Coin pages</a><br>\r\n<span id=\"purchase_4_purchase\"></span>\r\n<script language=\"JavaScript\">\r\nvar purchaseButton = Builder.node(\"a\", {href:\"#\", className:\"colorlink orange\"}, [ Builder.node(\"span\", \"Purchase\") ]);\r\n$(\"purchase_4_purchase\").appendChild(purchaseButton);\r\nEvent.observe(purchaseButton, \"click\", function(e) {\r\n    Event.stop(e);\r\n    var dialog = Dialog.createDialog(\"purchase_dialog\", \"Confirm purchase\", 9001, 0, -1000, closePurchase);\r\n    Dialog.appendDialogBody(dialog, \"<p style=\\\"text-align:center\\\"><img src=\\\"%url%/web-gallery/images/progress_bubbles.gif\\\" alt=\\\"\\\" width=\\\"29\\\" height=\\\"6\\\" /></p><div style=\\\"clear\\\"></div>\", true);\r\n    Dialog.moveDialogToCenter(dialog);\r\n    Overlay.show();\r\n	new Ajax.Request(\r\n		habboReqPath + \"/furnipurchase/purchase_confirmation\",\r\n		{ method: \"post\", parameters: \"product=\"+encodeURIComponent(\"hiphop_masterclass_deal\"), onComplete: function(req, json) {\r\n			Dialog.setDialogBody(dialog, req.responseText);\r\n		} }\r\n	);\r\n}, false);\r\n</script>\r\n\r\n</div><br><br>\r\n<p></p><p><span style=\"font-weight: bold;\"></span><br></p>', 'both', 0),
(52, 'Taxed by Trax?', '<a href=\"%url%/help/faqs?faq_1_categoryId=56\" target=\"_self\">Check out the FAQs</a><br>', 'both', 0),
(53, 'TraxStore', '<p><img src=\"%c_images%/album2304/Traxshop_image_03.gif\" alt=\"\" /><br /><br />Your one stop shop for all your Trax needs!<br /><br /><a href=\"%url%/hotel/trax/store/\" target=\"_self\">Visit the TraxStore &gt;&gt;</a></p>', 'both', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_boxes_pages`
--

CREATE TABLE `cms_boxes_pages` (
  `id` int(11) NOT NULL,
  `box_id` int(11) NOT NULL,
  `page` varchar(35) NOT NULL,
  `column` int(2) NOT NULL,
  `color` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_boxes_pages`
--

INSERT INTO `cms_boxes_pages` (`id`, `box_id`, `page`, `column`, `color`) VALUES
(1, 2, 'index', 1, 'orange'),
(2, 3, 'index', 2, 'green'),
(3, 1, 'hotel', 1, 'orange'),
(5, 5, 'hotel', 2, 'green'),
(6, 6, 'hotel', 2, 'green'),
(7, 7, 'hotel', 3, 'blue'),
(8, 8, 'hotel', 3, 'blue'),
(9, 9, 'hotel', 3, 'blue'),
(10, 10, 'credits.furniture', 1, 'yellow'),
(11, 11, 'credits.furniture', 1, 'yellow'),
(12, 7, 'credits.furniture', 1, 'yellow'),
(13, 10, 'hotel.staff', 1, 'yellow'),
(14, 12, 'hotel.staff', 1, 'yellow'),
(15, 10, 'hotel.pets', 1, 'yellow'),
(16, 12, 'hotel.pets', 1, 'yellow'),
(17, 13, 'hotel.pets', 1, 'yellow'),
(18, 14, 'hotel.pets', 1, 'yellow'),
(19, 15, 'hotel.pets', 1, 'yellow'),
(20, 16, 'hotel.room', 1, 'yellow'),
(21, 10, 'hotel.room', 1, 'yellow'),
(22, 12, 'hotel.room', 1, 'yellow'),
(23, 7, 'hotel.room', 1, 'yellow'),
(24, 17, 'hotel.groups', 1, 'orange'),
(25, 18, 'hotel.groups', 1, 'orange'),
(26, 19, 'club.shop', 1, 'orange'),
(27, 16, 'hotel.welcome', 1, 'yellow'),
(28, 10, 'hotel.welcome', 1, 'yellow'),
(29, 12, 'hotel.welcome', 1, 'yellow'),
(30, 7, 'hotel.welcome', 1, 'yellow'),
(31, 20, 'hotel.welcome', 2, 'yellow'),
(32, 21, 'home.about', 1, 'orange'),
(33, 22, 'home.about', 1, 'blue'),
(34, 23, 'home.about', 1, 'blue'),
(35, 10, 'hotel.homes', 1, 'orange'),
(37, 10, 'hotel.navigator', 1, 'yellow'),
(38, 12, 'hotel.navigator', 1, 'yellow'),
(39, 7, 'hotel.navigator', 1, 'yellow'),
(40, 26, 'help.index', 1, 'yellow'),
(41, 16, 'help.index', 1, 'yellow'),
(42, 27, 'help.index', 2, 'yellow'),
(43, 28, 'help.index', 2, 'yellow'),
(44, 29, 'help.index', 2, 'yellow'),
(45, 30, 'help.index', 3, 'yellow'),
(46, 7, 'community.index', 1, 'yellow'),
(47, 31, 'community.index', 1, 'yellow'),
(48, 32, 'community.index', 2, 'yellow'),
(49, 10, 'community.fansites', 1, 'yellow'),
(50, 12, 'community.fansites', 1, 'yellow'),
(51, 33, 'games.index', 1, 'yellow'),
(52, 34, 'games.index', 1, 'yellow'),
(53, 35, 'games.index', 2, 'yellow'),
(54, 36, 'games.index', 2, 'yellow'),
(55, 37, 'games.index', 2, 'yellow'),
(56, 38, 'help.hotel_way', 1, 'yellow'),
(57, 39, 'help.hotel_way', 1, 'yellow'),
(58, 40, 'help.contact_us', 1, 'yellow'),
(59, 41, 'index', 1, 'orange'),
(60, 34, 'games.battleball.index', 1, 'yellow'),
(61, 42, 'games.battleball.index', 1, 'yellow'),
(62, 34, 'games.battleball.how_to_play', 1, 'yellow'),
(63, 43, 'games.battleball.how_to_play', 1, 'yellow'),
(64, 34, 'games.battleball.high_scores', 1, 'yellow'),
(65, 42, 'games.battleball.high_scores', 1, 'yellow'),
(66, 34, 'games.battleball.challenge', 1, 'yellow'),
(67, 43, 'games.battleball.challenge', 1, 'yellow'),
(68, 34, 'games.snowstorm.high_scores', 1, 'yellow'),
(69, 34, 'games.snowstorm.rules', 1, 'yellow'),
(70, 44, 'games.snowstorm.rules', 1, 'yellow'),
(71, 34, 'games.snowstorm.index', 1, 'yellow'),
(72, 34, 'games.wobblesquabble.index', 1, 'yellow'),
(73, 45, 'games.wobblesquabble.index', 1, 'yellow'),
(74, 34, 'games.wobblesquabble.high_scores', 1, 'yellow'),
(75, 34, 'games.dive', 1, 'yellow'),
(76, 46, 'hotel.trax.index', 1, 'green'),
(77, 47, 'hotel.trax.index', 1, 'green'),
(78, 48, 'hotel.trax.index', 1, 'green'),
(79, 48, 'hotel.trax.store', 1, 'orange'),
(80, 49, 'hotel.trax.store', 1, 'orange'),
(81, 50, 'hotel.trax.store', 1, 'orange'),
(82, 51, 'hotel.trax.store', 1, 'orange'),
(83, 52, 'hotel.trax.store', 1, 'orange'),
(84, 53, 'hotel.trax.masterclass', 1, 'orange'),
(85, 52, 'hotel.trax.masterclass', 1, 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `cms_groups`
--

CREATE TABLE `cms_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `badge` varchar(255) NOT NULL,
  `url` varchar(30) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cms_groups_members`
--

CREATE TABLE `cms_groups_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` tinyint(4) NOT NULL,
  `member_since` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_groups_replies`
--

CREATE TABLE `cms_groups_replies` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_edited` enum('0','1') NOT NULL DEFAULT '0',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `hidden_by_staff` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cms_groups_topics`
--

CREATE TABLE `cms_groups_topics` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` tinytext NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `replies` int(11) NOT NULL DEFAULT 0,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `latest_comment` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cms_homes`
--

CREATE TABLE `cms_homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `x` smallint(5) UNSIGNED DEFAULT NULL,
  `y` smallint(5) UNSIGNED DEFAULT NULL,
  `z` smallint(5) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `data` text DEFAULT NULL,
  `skin` tinytext DEFAULT NULL,
  `home_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cms_homes_guestbook`
--

CREATE TABLE `cms_homes_guestbook` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `widget_id` int(11) NOT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_homes_rating`
--

CREATE TABLE `cms_homes_rating` (
  `user_id` int(11) NOT NULL,
  `home_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_homes_sessions`
--

CREATE TABLE `cms_homes_sessions` (
  `user_id` int(11) NOT NULL,
  `home_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `expires_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_homes_sessions`
--

INSERT INTO `cms_homes_sessions` (`user_id`, `home_id`, `group_id`, `expires_at`) VALUES
(1, 1, NULL, 1744681696);

-- --------------------------------------------------------

--
-- Table structure for table `cms_homes_store_items`
--

CREATE TABLE `cms_homes_store_items` (
  `id` int(11) NOT NULL,
  `caption` tinytext NOT NULL,
  `description` tinytext DEFAULT NULL,
  `class` tinytext NOT NULL,
  `category` smallint(6) NOT NULL,
  `price` tinyint(4) NOT NULL,
  `type` enum('b','s','w','commodity','gw') NOT NULL DEFAULT 's'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_homes_store_items`
--

INSERT INTO `cms_homes_store_items` (`id`, `caption`, `description`, `class`, `category`, `price`, `type`) VALUES
(1, 'needle_1', NULL, 'needle_1', 2, 3, 's'),
(2, 'needle_2', NULL, 'needle_2', 2, 3, 's'),
(3, 'needle_3', NULL, 'needle_3', 2, 3, 's'),
(4, 'note', NULL, 'note', 2, 3, 'commodity'),
(5, 'Profile Widget', NULL, 'profilewidget', 3, 0, 'w'),
(6, 'Friends Widget', 'Displays all your friends', 'friendswidget', 3, 0, 'w'),
(7, 'Guestbook Widget', 'Guestbook', 'guestbookwidget', 3, 0, 'w'),
(8, 'Rating Widget', 'Allows members to vote on your page. You cannot vote for yourself.', 'ratingwidget', 3, 0, 'w'),
(9, 'Badges Widget', 'Show your badges on your page.', 'badgeswidget', 3, 0, 'w'),
(10, 'Rooms Widget', 'Show your rooms in your page', 'roomswidget', 3, 0, 'w'),
(11, 'High Scores Widget', 'Display your high scores', 'highscoreswidget', 3, 0, 'w'),
(12, 'TraxPlayer Widget', 'Play Trax on your homepage.', 'traxplayerwidget', 3, 0, 'w'),
(13, 'Pattern Abstract 1', NULL, 'bg_pattern_abstract1', 4, 2, 'b'),
(14, 'sticker_spaceduck', NULL, 'sticker_spaceduck', 2, 1, 's'),
(15, 'sticker_moonpig', NULL, 'sticker_moonpig', 2, 1, 's'),
(16, 'sticker_catinabox', NULL, 'sticker_catinabox', 2, 1, 's'),
(17, 'bg_pattern_abstract2', NULL, 'bg_pattern_abstract2', 2, 1, 'b'),
(18, 'GroupInfo Widget', NULL, 'groupinfowidget', 3, 0, 'gw'),
(19, 'Member Widget', NULL, 'memberwidget', 3, 0, 'gw'),
(20, 'paper_clip_1', NULL, 'paper_clip_1', 2, 3, 's'),
(21, 'paper_clip_2', NULL, 'paper_clip_2', 2, 3, 's'),
(22, 'paper_clip_3', NULL, 'paper_clip_3', 2, 3, 's'),
(23, 'needle_4', NULL, 'needle_4', 2, 3, 's'),
(24, 'needle_5', NULL, 'needle_5', 2, 3, 's'),
(25, 'sticker_flames', NULL, 'sticker_flames', 2, 3, 's'),
(26, 'sticker_cactus_anim', NULL, 'sticker_cactus_anim', 2, 5, 's'),
(27, 'sticker_spaceduck', NULL, 'sticker_spaceduck', 2, 3, 's'),
(28, 'sticker_arrow_down', NULL, 'sticker_arrow_down', 2, 3, 's'),
(29, 'sticker_arrow_left', NULL, 'sticker_arrow_left', 2, 3, 's'),
(30, 'sticker_arrow_down', NULL, 'sticker_arrow_up', 2, 3, 's'),
(31, 'sticker_arrow_left', NULL, 'sticker_arrow_right', 2, 3, 's'),
(32, 'xmas2009_snowshake', NULL, 'xmas2009_snowshake', 2, 3, 's'),
(33, 'finger_push', NULL, 'finger_push', 2, 3, 's'),
(34, 'sticker_pointing_hand_1', NULL, 'sticker_pointing_hand_1', 2, 3, 's'),
(35, 'sticker_pirateHat_1', NULL, 'sticker_pirateHat_1', 2, 3, 's'),
(36, 'sticker_pirateHat_2', NULL, 'sticker_pirateHat_2', 2, 3, 's'),
(37, 'stick_telepizza_scooter', NULL, 'stick_telepizza_scooter', 2, 3, 's'),
(38, 'Guestbook Widget', NULL, 'guestbookwidget', 3, 0, 'gw'),
(39, 'Groups Widget', 'Displays all your groups', 'groupswidget', 3, 0, 'w');

-- --------------------------------------------------------

--
-- Table structure for table `cms_items_offers`
--

CREATE TABLE `cms_items_offers` (
  `id` int(11) NOT NULL,
  `salecode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `items` text NOT NULL,
  `price` int(11) NOT NULL,
  `enabled` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_items_offers`
--

INSERT INTO `cms_items_offers` (`id`, `salecode`, `name`, `items`, `price`, `enabled`) VALUES
(1, 'starter_mode', 'A La Mode', 'chair_polyfon;chair_polyfon;table_polyfon_med;doormat_plain', 5, '1'),
(2, 'starter_tv', 'Tube Pack', 'red_tv;chair_plasty*3;stand_polyfon_z', 5, '1'),
(3, 'starter_green', 'Living Green', 'carpet_standard*a;doormat_love;plant_sunflower;table_silo_small', 5, '1'),
(4, 'starter_home', 'Home, Sweet, Home', 'sofa_silo;sofachair_silo;carpet_polar;fireplace_armas', 10, '1'),
(5, 'starter_candy', 'Girl Talk', 'sofachair_polyfon_girl;wallmirror;carpet_polar*1;stand_polyfon_z;plant_rose', 10, '1'),
(6, 'starter_plastic1', 'Plastic Fantastic', 'chair_plasto*5;chair_plasto*5;chair_plasto*5;chair_plasto*5;table_plasto_4leg*5', 10, '1'),
(7, 'starter_bedroom', 'Sleep In Style', 'plant_yukka;bed_budgetb_one;shelves_basic;lamp_basic', 10, '1'),
(8, 'starter_kitchen', 'Bachelor Pad', 'fridge;pizza;poster 3;table_plasto_square', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu`
--

CREATE TABLE `cms_menu` (
  `id` int(11) NOT NULL,
  `url` varchar(125) NOT NULL,
  `caption` varchar(55) NOT NULL,
  `icon` varchar(35) DEFAULT NULL,
  `parent_id` int(5) NOT NULL DEFAULT -1,
  `order_num` int(3) NOT NULL,
  `min_rank` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cms_menu`
--

INSERT INTO `cms_menu` (`id`, `url`, `caption`, `icon`, `parent_id`, `order_num`, `min_rank`) VALUES
(1, '', 'Home', 'tab_icon_01_home', -1, 1, 1),
(2, 'hotel', 'New?', 'tab_icon_02_hotel', -1, 2, 1),
(3, 'club', 'Habbo Club', 'hc_tab_ani3', -1, 3, 1),
(4, 'credits', 'Credits', 'tab_icon_10_coins', -1, 4, 1),
(5, 'help', 'Help', 'tab_icon_08_help', -1, 10, 1),
(6, 'hotel', 'Welcome', NULL, 2, 1, 1),
(7, 'credits/furniture', 'Furniture', NULL, 2, 2, 1),
(8, 'hotel/pets', 'Pets', NULL, 2, 2, 1),
(9, 'club', 'Habbo Club', NULL, 2, 3, 1),
(10, 'hotel/welcome_to_habbo_hotel/your_own_room', 'Your Own Room', NULL, 2, 4, 1),
(11, 'credits', 'Habbo Credits', NULL, 2, 5, 1),
(12, 'hotel/staff', 'Hotel Staff', NULL, 2, 6, 1),
(13, 'hotel/groups', 'Groups', NULL, 26, 0, 1),
(14, 'club', 'Benefits', NULL, 3, 1, 1),
(15, 'club/join', 'Join or Extend Membership', NULL, 3, 2, 1),
(16, 'club/shop', 'Club Shop', NULL, 3, 3, 1),
(17, 'credits', 'Credits', NULL, 4, 1, 1),
(18, 'club', 'Habbo Club', NULL, 4, 2, 1),
(19, 'credits/furniture', 'Furniture', NULL, 4, 3, 1),
(21, 'help', 'Help & Safety Home', NULL, 5, 1, 1),
(22, 'help/hotel_way', 'The Habbo Way', NULL, 5, 2, 1),
(23, 'credits/collectibles', 'Collectibles', NULL, 4, 2, 1),
(25, 'community', 'Community', 'tab_icon_03_community', -1, 2, 1),
(26, 'hotel/groups', 'Groups', 'tab_icon_05_fun', -1, 3, 1),
(27, 'games', 'Games', 'tab_icon_04_games', -1, 3, 1),
(29, 'community', 'Community', NULL, 25, 1, 1),
(30, 'community/fansites', 'Fansites', NULL, 25, 1, 1),
(31, 'games', 'Games', NULL, 27, 1, 1),
(33, 'help/contact_us', 'Contact Us', NULL, 5, 3, 1),
(34, 'games/battleball', 'Battle Ball', NULL, 27, 2, 1),
(35, 'games/snowstorm', 'SnowStorm', NULL, 27, 5, 1),
(36, 'games/wobblesquabble', 'Wobble Squabble', NULL, 27, 3, 1),
(37, 'games/dive', 'Freefall Dive', NULL, 27, 4, 1),
(38, 'hotel/trax', 'Trax Machine', NULL, 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_permissions`
--

CREATE TABLE `cms_permissions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` tinytext NOT NULL,
  `cms_home_can_delete_message` enum('0','1') NOT NULL DEFAULT '0',
  `can_access_housekeeping` enum('0','1') NOT NULL DEFAULT '0',
  `can_check_updates` enum('0','1') NOT NULL DEFAULT '0',
  `can_check_logs` enum('0','1') NOT NULL DEFAULT '0',
  `can_save_notes` enum('0','1') NOT NULL DEFAULT '0',
  `can_settings_hotel` enum('0','1') NOT NULL DEFAULT '0',
  `can_settings_site` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_server_settings` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_server_wordfilter` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_server_welcomemsg` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_site_settings` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_site_ads` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_site_maintenance` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_site_loader` enum('0','1') NOT NULL DEFAULT '0',
  `can_create_site_news` enum('0','1') NOT NULL DEFAULT '0',
  `can_restore_site_news` enum('0','1') NOT NULL DEFAULT '0',
  `can_manage_site_box` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_users` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_users_guestroom` enum('0','1') NOT NULL DEFAULT '0',
  `can_check_transactions` enum('0','1') NOT NULL DEFAULT '0',
  `can_create_vouchers` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_stafflogs` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_bans` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_alertlogs` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_chatlogs` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_consolelogs` enum('0','1') NOT NULL DEFAULT '0',
  `can_delete_catalogue_pages` enum('0','1') NOT NULL DEFAULT '0',
  `can_add_catalogue_pages` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_catalogue_pages` enum('0','1') NOT NULL DEFAULT '0',
  `can_delete_catalogue_items` enum('0','1') NOT NULL DEFAULT '0',
  `can_add_catalogue_items` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_catalogue_items` enum('0','1') NOT NULL DEFAULT '0',
  `can_user_ban` enum('0','1') NOT NULL DEFAULT '0',
  `can_user_unban` enum('0','1') NOT NULL DEFAULT '0',
  `can_view_reports` enum('0','1') NOT NULL DEFAULT '0',
  `can_edit_website_menu` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_permissions`
--

INSERT INTO `cms_permissions` (`id`, `name`, `cms_home_can_delete_message`, `can_access_housekeeping`, `can_check_updates`, `can_check_logs`, `can_save_notes`, `can_settings_hotel`, `can_settings_site`, `can_edit_server_settings`, `can_edit_server_wordfilter`, `can_edit_server_welcomemsg`, `can_edit_site_settings`, `can_edit_site_ads`, `can_edit_site_maintenance`, `can_edit_site_loader`, `can_create_site_news`, `can_restore_site_news`, `can_manage_site_box`, `can_edit_users`, `can_edit_users_guestroom`, `can_check_transactions`, `can_create_vouchers`, `can_view_stafflogs`, `can_view_bans`, `can_view_alertlogs`, `can_view_chatlogs`, `can_view_consolelogs`, `can_delete_catalogue_pages`, `can_add_catalogue_pages`, `can_edit_catalogue_pages`, `can_delete_catalogue_items`, `can_add_catalogue_items`, `can_edit_catalogue_items`, `can_user_ban`, `can_user_unban`, `can_view_reports`, `can_edit_website_menu`) VALUES
(1, 'Member', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'Community Manager', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 'Guide', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 'Hobba', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 'Super Hobba', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 'Moderator', '0', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, 'Administrator', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_reports`
--

CREATE TABLE `cms_reports` (
  `id` int(11) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `type` enum('name','room','motto','stickie','animator','habbomovie','groupname','url','groupdesc','guestbook','discussionpost','none') NOT NULL DEFAULT 'none',
  `message` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `picked_by` int(11) DEFAULT NULL,
  `closed` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `key` tinytext NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`key`, `value`) VALUES
('site.maintenance.enabled', '0'),
('site.style.background', '/web/images/bg_patterns/habbo.gif'),
('site.style.hotelview', '/web/images/hotelviews/web_view_bg_no.gif'),
('site.style.enter', '/web/images/enterbuttons/enterHH_uk.gif'),
('hotel.name.short', 'Habbo'),
('hotel.name.full', 'Habbo Hotel'),
('register.default.credits', '500'),
('register.default.film', '0'),
('register.default.tickets', '0'),
('register.default.motto', NULL),
('connection.mus.host', '127.0.0.1'),
('connection.mus.port', '12322'),
('connection.info.host', '127.0.0.1'),
('connection.info.port', '12321'),
('external.variables.txt', 'http://127.0.0.1/dcr/external_vars.txt'),
('external.texts.txt', 'http://127.0.0.1/dcr/external_texts.txt'),
('habbo.dcr.url', 'http://127.0.0.1/dcr/habbo.dcr'),
('site.avatarimage.url', 'http://127.0.0.1/habbo-imaging/avatarimage?figure='),
('connection.rcon.host', '127.0.0.1'),
('connection.rcon.port', '12309'),
('site.admin.notes', 'Hello there!\r\nThis is the Housekeeping.\r\nBe careful! 🙂'),
('register.default.console_motto', NULL),
('hotel.gift.wraps', '415,416,417,418,419,420'),
('site.badges.url', 'http://127.0.0.1/c_images/Badges'),
('furni.large.url', 'http://127.0.0.1/furni/large'),
('site.groupbadge.url', 'http://127.0.0.1/habbo-imaging/badge/'),
('site.ads_160.enabled', '0'),
('site.ads_300.enabled', '0'),
('site.ads_160.content', NULL),
('site.ads_300.content', NULL),
('site.ads_footer.content', NULL),
('site.ads_footer.enabled', '0'),
('site.tracking.content', NULL),
('site.tracking.enabled', '0'),
('furni.small.url', 'http://127.0.0.1/furni/small'),
('clear.staff_logs.user_id', '1'),
('site.c_images.url', 'http://127.0.0.1/c_images');

-- --------------------------------------------------------

--
-- Table structure for table `cms_stafflogs`
--

CREATE TABLE `cms_stafflogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page` tinytext NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users_settings`
--

CREATE TABLE `cms_users_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_public` enum('0','1') NOT NULL DEFAULT '1',
  `favorite_group` int(11) DEFAULT NULL,
  `discussions_posts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_articles`
--
ALTER TABLE `cms_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_boxes`
--
ALTER TABLE `cms_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_boxes_pages`
--
ALTER TABLE `cms_boxes_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_groups`
--
ALTER TABLE `cms_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_groups_members`
--
ALTER TABLE `cms_groups_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_groups_replies`
--
ALTER TABLE `cms_groups_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_groups_topics`
--
ALTER TABLE `cms_groups_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_homes`
--
ALTER TABLE `cms_homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_homes_guestbook`
--
ALTER TABLE `cms_homes_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_homes_rating`
--
ALTER TABLE `cms_homes_rating`
  ADD PRIMARY KEY (`user_id`,`home_id`);

--
-- Indexes for table `cms_homes_sessions`
--
ALTER TABLE `cms_homes_sessions`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cms_homes_store_items`
--
ALTER TABLE `cms_homes_store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_items_offers`
--
ALTER TABLE `cms_items_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_permissions`
--
ALTER TABLE `cms_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_reports`
--
ALTER TABLE `cms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD UNIQUE KEY `key` (`key`) USING HASH;

--
-- Indexes for table `cms_stafflogs`
--
ALTER TABLE `cms_stafflogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users_settings`
--
ALTER TABLE `cms_users_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_articles`
--
ALTER TABLE `cms_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_boxes`
--
ALTER TABLE `cms_boxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `cms_boxes_pages`
--
ALTER TABLE `cms_boxes_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `cms_groups`
--
ALTER TABLE `cms_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_groups_members`
--
ALTER TABLE `cms_groups_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_groups_replies`
--
ALTER TABLE `cms_groups_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cms_groups_topics`
--
ALTER TABLE `cms_groups_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cms_homes`
--
ALTER TABLE `cms_homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `cms_homes_guestbook`
--
ALTER TABLE `cms_homes_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cms_homes_sessions`
--
ALTER TABLE `cms_homes_sessions`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_homes_store_items`
--
ALTER TABLE `cms_homes_store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cms_items_offers`
--
ALTER TABLE `cms_items_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cms_menu`
--
ALTER TABLE `cms_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cms_permissions`
--
ALTER TABLE `cms_permissions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms_reports`
--
ALTER TABLE `cms_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cms_stafflogs`
--
ALTER TABLE `cms_stafflogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `cms_users_settings`
--
ALTER TABLE `cms_users_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
