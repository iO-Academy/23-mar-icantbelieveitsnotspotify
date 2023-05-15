# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: music
# Generation Time: 2023-04-12 11:20:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table albums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `album_name` varchar(255) NOT NULL,
  `artwork_url` varchar(1000) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;

INSERT INTO `albums` (`id`, `album_name`, `artwork_url`, `artist_id`)
VALUES
	(1,'When We All Fall Asleep, Where Do We Go?','https://via.placeholder.com/400x400/466365/B49A67?text=When+We+All+Fall+Asleep%2C+Where+Do+We+Go%3F',1),
	(2,'Happier Than Ever','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Happier+Than+Ever',1),
	(3,'Lemonade','https://via.placeholder.com/400x400/466365/B49A67?text=Lemonade',2),
	(4,'BEYONCE','https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=BEYONCE',2),
	(5,'Lover','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Lover',3),
	(6,'1989','https://via.placeholder.com/400x400/386641/6A994E?text=1989',3),
	(7,'folklore','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=folklore',3),
	(8,'evermore','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=evermore',3),
	(9,'Lost and Found','https://via.placeholder.com/400x400/70798C/252323?text=Lost+and+Found',4),
	(10,'Ã·','https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=%C3%B7',5),
	(11,'x','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=x',5),
	(12,'25','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=25',6),
	(13,'21','https://via.placeholder.com/400x400/466365/B49A67?text=21',6),
	(14,'19','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=19',6),
	(15,'Invasion of Privacy','https://via.placeholder.com/400x400/386641/6A994E?text=Invasion+of+Privacy',7),
	(16,'Justice','https://via.placeholder.com/400x400/70798C/252323?text=Justice',8),
	(17,'Changes','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Changes',8),
	(18,'Purpose','https://via.placeholder.com/400x400/386641/6A994E?text=Purpose',8),
	(19,'Spice','https://via.placeholder.com/400x400/386641/6A994E?text=Spice',9),
	(20,'Spiceworld','https://via.placeholder.com/400x400/466365/B49A67?text=Spiceworld',9),
	(21,'Forever','https://via.placeholder.com/400x400/466365/B49A67?text=Forever',9),
	(22,'Watermark','https://via.placeholder.com/400x400/386641/6A994E?text=Watermark',10),
	(23,'Shepherd Moons','https://via.placeholder.com/400x400/70798C/252323?text=Shepherd+Moons',10),
	(24,'The Memory of Trees','https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees',10),
	(25,'Amala','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Amala',11),
	(26,'Hot Pink','https://via.placeholder.com/400x400/70798C/252323?text=Hot+Pink',11),
	(27,'Planet Her','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Planet+Her',11),
	(28,'Hurts 2B Human','https://via.placeholder.com/400x400/70798C/252323?text=Hurts+2B+Human',12),
	(29,'Beautiful Trauma','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Beautiful+Trauma',12),
	(30,'The Truth About Love','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=The+Truth+About+Love',12),
	(31,'Kamikaze','https://via.placeholder.com/400x400/466365/B49A67?text=Kamikaze',13),
	(32,'Revival','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Revival',13),
	(33,'The Marshall Mathers LP 2','https://via.placeholder.com/400x400/386641/6A994E?text=The+Marshall+Mathers+LP+2',13),
	(34,'Pretty Summer Playlist: Season 1','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Pretty+Summer+Playlist%3A+Season+1',14),
	(35,'The Day Is My Enemy','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=The+Day+Is+My+Enemy',15),
	(36,'Invaders Must Die','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Invaders+Must+Die',15),
	(37,'Always Outnumbered, Never Outgunned','https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Always+Outnumbered%2C+Never+Outgunned',15),
	(38,'Miracle Pill','https://via.placeholder.com/400x400/70798C/252323?text=Miracle+Pill',16),
	(39,'Boxes','https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=Boxes',16),
	(40,'Magnetic','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Magnetic',16),
	(41,'Man of the Woods','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Man+of+the+Woods',17),
	(42,'The 20/20 Experience - 2 of 2','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=The+20%2F20+Experience+-+2+of+2',17),
	(43,'The 20/20 Experience','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=The+20%2F20+Experience',17),
	(44,'The Black Light','https://via.placeholder.com/400x400/386641/6A994E?text=The+Black+Light',18),
	(45,'Super Critical','https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Super+Critical',18);

/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artists`;

CREATE TABLE `artists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;

INSERT INTO `artists` (`id`, `artist_name`)
VALUES
	(1,'Billie Eilish'),
	(2,'Beyonce'),
	(3,'Taylor Swift'),
	(4,'Will Smith'),
	(5,'Ed Sheeran'),
	(6,'Adele'),
	(7,'Cardi B'),
	(8,'Justin Bieber'),
	(9,'Spice Girls'),
	(10,'Enya'),
	(11,'Doja Cat'),
	(12,'Pink'),
	(13,'Eminem'),
	(14,'Saweetie'),
	(15,'The Prodigy'),
	(16,'Goo Goo Dolls'),
	(17,'Justin Timberlake'),
	(18,'The Ting Tings');

/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table songs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `songs`;

CREATE TABLE `songs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(255) NOT NULL,
  `length` float(3,2) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;

INSERT INTO `songs` (`id`, `song_name`, `length`, `album_id`)
VALUES
	(1,'bad guy',3.23,1),
	(2,'bury a friend',3.00,1),
	(3,'you should see me in a crown',3.45,1),
	(4,'NDA',3.14,2),
	(5,'Therefore I Am',3.29,2),
	(6,'Happier Than Ever',3.17,2),
	(7,'Formation',3.57,3),
	(8,'Sorry',3.06,3),
	(9,'Hold Up',3.57,3),
	(10,'Drunk in Love',3.29,4),
	(11,'Partition',3.58,4),
	(12,'XO',3.59,4),
	(13,'ME!',3.19,5),
	(14,'You Need To Calm Down',3.20,5),
	(15,'Lover',3.54,5),
	(16,'Shake It Off',3.10,6),
	(17,'Blank Space',3.33,6),
	(18,'Bad Blood',3.57,6),
	(19,'the 1',3.33,7),
	(20,'cardigan',3.15,7),
	(21,'exile (feat. Bon Iver)',3.08,7),
	(22,'my tears ricochet',3.26,7),
	(23,'mirrorball',3.54,7),
	(24,'seven',3.27,7),
	(25,'august',3.54,7),
	(26,'this is me trying',3.27,7),
	(27,'illicit affairs',3.05,7),
	(28,'invisible string',3.13,7),
	(29,'mad woman',3.16,7),
	(30,'epiphany',3.24,7),
	(31,'betty',3.08,7),
	(32,'peace',3.41,7),
	(33,'hoax',3.15,7),
	(34,'willow',3.57,8),
	(35,'champagne problems',3.05,8),
	(36,'gold rush',3.08,8),
	(37,'\'tis the damn season',3.02,8),
	(38,'tolerate it',3.09,8),
	(39,'no body, no crime (feat. HAIM)',3.20,8),
	(40,'happiness',3.21,8),
	(41,'dorothea',3.26,8),
	(42,'coney island (feat. The National)',3.09,8),
	(43,'ivy',3.42,8),
	(44,'cowboy like me',3.53,8),
	(45,'long story short',3.15,8),
	(46,'marjorie',3.55,8),
	(47,'closure',3.26,8),
	(48,'Here He Comes',3.18,9),
	(49,'Party Starter',3.57,9),
	(50,'Switch',3.14,9),
	(51,'Mr. Niceguy',3.40,9),
	(52,'Ms. Holy Roller',3.29,9),
	(53,'Tell Me Why',3.59,9),
	(54,'I Wish I Made That / Swagga',3.35,9),
	(55,'Shape of You',3.49,10),
	(56,'Castle on the Hill',3.51,10),
	(57,'Galway Girl',3.18,10),
	(58,'One',3.10,11),
	(59,'I\'m a Mess',3.30,11),
	(60,'Sing',3.22,11),
	(61,'Don\'t',3.42,11),
	(62,'Nina',3.56,11),
	(63,'Photograph',3.13,11),
	(64,'Bloodstream',3.26,11),
	(65,'Tenerife Sea',3.58,11),
	(66,'Runaway',3.40,11),
	(67,'The Man',3.04,11),
	(68,'Thinking Out Loud',3.42,11),
	(69,'Afire Love',3.11,11),
	(70,'Hello',3.19,12),
	(71,'When We Were Young',3.50,12),
	(72,'Send My Love (To Your New Lover)',3.41,12),
	(73,'Rolling in the Deep',3.45,13),
	(74,'Someone Like You',3.25,13),
	(75,'Set Fire to the Rain',3.56,13),
	(76,'Chasing Pavements',3.57,14),
	(77,'Hometown Glory',3.42,14),
	(78,'Cold Shoulder',3.36,14),
	(79,'Bodak Yellow',3.22,15),
	(80,'I Like It',3.10,15),
	(81,'Be Careful',3.08,15),
	(82,'Peaches (feat. Daniel Caesar & Giveon)',3.34,16),
	(83,'Hold On',3.48,16),
	(84,'Anyone',3.10,16),
	(85,'Yummy',3.55,17),
	(86,'Intentions (feat. Quavo)',3.54,17),
	(87,'Forever (feat. Post Malone & Clever)',3.46,17),
	(88,'What Do You Mean?',3.14,18),
	(89,'Sorry',3.49,18),
	(90,'Love Yourself',3.04,18),
	(91,'Wannabe',3.33,19),
	(92,'Say You\'ll Be There',3.32,19),
	(93,'2 Become 1',3.41,19),
	(94,'Spice Up Your Life',3.15,20),
	(95,'Stop',3.51,20),
	(96,'Too Much',3.28,20),
	(97,'Holler',3.07,21),
	(98,'Let Love Lead the Way',3.50,21),
	(99,'Goodbye',3.05,21),
	(100,'Orinoco Flow',3.22,22),
	(101,'Storms in Africa',3.57,22),
	(102,'On Your Shore',3.04,22),
	(103,'Caribbean Blue',3.48,23),
	(104,'Shepherd Moons',3.05,23),
	(105,'How Can I Keep from Singing?',3.46,23),
	(106,'Anywhere Is',3.06,24),
	(107,'China Roses',3.31,24),
	(108,'The Memory of Trees',3.19,24),
	(109,'Go To Town',3.22,25),
	(110,'Cookie Jar',3.26,25),
	(111,'Roll With Us',3.55,25),
	(112,'Say So',3.09,26),
	(113,'Boss Bitch',3.45,26),
	(114,'Like That (feat. Gucci Mane)',3.03,26),
	(115,'Kiss Me More (feat. SZA)',3.54,27),
	(116,'Woman',3.44,27),
	(117,'Ain\'t Shit',3.58,27),
	(118,'Walk Me Home',3.13,28),
	(119,'Hustle',3.32,28),
	(120,'Can We Pretend (feat. Cash Cash)',3.18,28),
	(121,'What About Us',3.50,29),
	(122,'Beautiful Trauma',3.47,29),
	(123,'Revenge (feat. Eminem)',3.08,29),
	(124,'Whatever You Want',3.30,29),
	(125,'Blow Me (One Last Kiss)',3.06,30),
	(126,'Try',3.56,30),
	(127,'Just Give Me a Reason (feat. Nate Ruess)',3.17,30),
	(128,'True Love (feat. Lily Allen)',3.56,30),
	(129,'The Ringer',3.43,31),
	(130,'Lucky You (feat. Joyner Lucas)',3.47,31),
	(131,'Not Alike (feat. Royce Da 5\'9\")',3.59,31),
	(132,'Kamikaze',3.28,31),
	(133,'Fall',3.33,31),
	(134,'Venom (Music from the Motion Picture)',3.41,31),
	(135,'Walk on Water (feat. BeyoncÃ©)',3.38,32),
	(136,'Believe',3.00,32),
	(137,'Untouchable',3.52,32),
	(138,'Like Home (feat. Alicia Keys)',3.20,32),
	(139,'River (feat. Ed Sheeran)',3.32,32),
	(140,'Bad Guy',3.49,33),
	(141,'Survival',3.23,33),
	(142,'Rap God',3.34,33),
	(143,'Berzerk',3.39,33),
	(144,'Best Friend (feat. Doja Cat)',3.14,34),
	(145,'See Saw (feat. Kendra Jae)',3.14,34),
	(146,'Pretty & Rich',3.50,34),
	(147,'Nasty',3.58,35),
	(148,'The Day Is My Enemy',3.39,35),
	(149,'Wild Frontier',3.04,35),
	(150,'Rhythm Bomb (feat. Flux Pavilion)',3.42,35),
	(151,'Destroy',3.59,35),
	(152,'Omen',3.28,36),
	(153,'Warrior\'s Dance',3.25,36),
	(154,'Take Me to the Hospital',3.35,36),
	(155,'Invaders Must Die',3.57,36),
	(156,'World\'s on Fire',3.34,36),
	(157,'Spitfire',3.01,37),
	(158,'Girls',3.26,37),
	(159,'Hotride',3.37,37),
	(160,'Medusa\'s Path',3.12,37),
	(161,'Action Radar',3.47,37),
	(162,'Indestructible',3.17,38),
	(163,'Miracle Pill',3.07,38),
	(164,'Money, Fame & Fortune',3.09,38),
	(165,'Life\'s a Message',3.52,38),
	(166,'Autumn Leaves',3.39,38),
	(167,'Over and Over',3.29,39),
	(168,'So Alive',3.07,39),
	(169,'Flood (feat. Sydney Sierota)',3.47,39),
	(170,'Lucky One',3.10,39),
	(171,'Souls in the Machine',3.41,39),
	(172,'Rebel Beat',3.47,40),
	(173,'When the World Breaks Your Heart',3.04,40),
	(174,'Filthy',3.55,41),
	(175,'Say Something (feat. Chris Stapleton)',3.29,41),
	(176,'Man of the Woods',3.44,41),
	(177,'Montana',3.46,41),
	(178,'Breeze Off the Pond',3.26,41),
	(179,'Take Back the Night',3.45,42),
	(180,'TKO',3.13,42),
	(181,'True Blood',3.18,42),
	(182,'Only When I Walk Away',3.18,42),
	(183,'Suit & Tie (feat. Jay-Z)',3.36,43),
	(184,'Mirrors',3.44,43),
	(185,'Pusher Love Girl',3.52,43),
	(186,'Don\'t Hold the Wall',3.11,43),
	(187,'That Girl',3.39,43),
	(188,'Estranged',3.24,44),
	(189,'Earthquake',3.04,44),
	(190,'A & E',3.58,44),
	(191,'Wrong Club',3.57,45),
	(192,'Do It Again',3.53,45),
	(193,'Give It Back',3.22,45),
	(194,'Green Poison',3.51,45),
	(195,'Only Love',3.33,45);

/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
