-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment1
-- ------------------------------------------------------
-- Server version 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS assignment1;

USE assignment1;

-- admin email : admin1@gmail.com
-- admin password : admin1234

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrators` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'ADMIN1@GMAIL.COM','$2y$10$haMUcRnm0Td44AEKd1yOz.LvG/gm3C2/UAGBCL5CnyITsgv9IHfhu'),(7,'ADMIN2@GMAIL.COM','$2y$10$qQtTBCXXb3yL037sDK8lSetZjJJjoOYLm9Tqo6O/3MovY5X0es54i');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23 19:47:45


-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment1
-- ------------------------------------------------------
-- Server version 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'USER1@GMAIL.COM','$2y$10$sH2yj2ri/5pF4Ckl2tOtPehTjvZ1/P91MSryC9LMZGIL6UihPgIX6','USER1'),(2,'USER2@GMAIL.COM','$2y$10$f.OpE.ysdkSybaC/fIQ43OO3tWpweFlscxNEldpIofdWjrSSJC03y','USER2'),(3,'USER3@GMAIL.COM','$2y$10$WNUNhEuUWbbsCRa/8Bl1H.qUaPcxquLfIjEdW3HujAPyM.365stL.','USER3'),(4,'USER4@GMAIL.COM','$2y$10$Moo6StLX7cYPdlTDh/3N/.CsK6Y/DBVvUfrkFIhlUPsOEr8TZr6HO','USER4');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23 19:47:45


-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment1
-- ------------------------------------------------------
-- Server version 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'BUSINESS'),(2,'ENTERTAINMENT'),(3,'SPORTS'),(4,'TECHNOLOGY'),(5,'TOURISM'),(6,'INTERNATIONAL'),(7,'TGIF'),(14,'MOVIES');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23 19:47:44


-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment1
-- ------------------------------------------------------
-- Server version 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(8000) DEFAULT NULL,
  `categoryId` int DEFAULT NULL,
  `publishDate` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `fk_a_category` (`categoryId`),
  CONSTRAINT `fk_a_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`category_id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'Roger Federer to retire from tennis after Laver Cup aged 41','<p>Swiss tennis great Roger Federer has announced his retirement from the sport, saying next week\'s Laver Cup will be his final ATP tournament; \"Tennis has treated me more generously than I ever would have dreamt, and now I must recognize when it is time to end my competitive career\"</p>\r\n\r\n<p>Roger Federer will retire from tennis after next week\'s Laver Cup, aged 41.</p>\r\n\r\n<p>The 20-time Grand Slam champion has been struggling with a knee problem for the last three years and has decided now is the time to step away.</p>\r\n\r\n<p>Federer will play in next week\'s Laver Cup in London, the Ryder Cup-style competition that was his brainchild but will then leave the professional game.</p>\r\n\r\n<p>Federer made the announcement via a letter posted on social media, which began: \"To my tennis family and beyond. Of all the gifts that tennis has given me over the years, the greatest, without a doubt, has been the people I\'ve met along the way: my friends, my competitors, and most of all the fans who give the sport its life. Today, I want to share some news with all of you.</p>\r\n\r\n<p>\"As many of you know, the past three years have presented me with challenges in the form of injuries and surgeries. I\'ve worked hard to return to full competitive form.</p>\r\n\r\n<p>\"But I also know my body\'s capacities and limits, and its message to me lately has been clear. I am 41 years old. I have played more than 1,500 matches over 24 years. Tennis has treated me more generously than I ever would have dreamt, and now I must recognize when it is time to end my competitive career.</p>\r\n\r\n<p>\"The Laver Cup next week in London will be my final ATP event. I will play more tennis in the future, of course, but just not in Grand Slams or on the tour.\"</p>',3,'15 Sep 2022','rogerfederer.jpg'),(2,'Zac Efron says he \'almost died\' after shattering his jaw','<p>Zac Efron has heard about speculation that he altered his face with plastic surgery, but he says that\'s not close to the truth.</p>\r\n\r\n<p>\"It was funny,\" he told \"Entertainment Tonight\" about people thinking he had gone under the knife. \"It sucks. I almost died, but we\'re good.\"</p>\r\n\r\n<p>While promoting his new film, \"The Greatest Beer Run Ever,\" Efron put the rumors to rest as he had actually been injured. The actor reportedly shattered his jaw and had to have it wired shut after he slipped in a puddle of water near his home.\r\nSomeone close to him told him that word on the street was he had undergone plastic surgery.\r\n\"My mom told me,\" he said. \"I never really read the internet, so, I don\'t really care.\"\r\nViewers can catch his face, along with those of costars Bill Murray and Russell Crowe, in the new movie in which he plays a man who in 1967 travels to Vitenam to bring beer to his childhood buddies who are fighting for the Army during the war.\r\nIt premieres September 30 on Apple TV+.</p>',2,'15 Sep 2022','zacefron.jpg'),(3,'First US rail strike in 30 years averted with tentative deal - Biden','<p>US freight rail companies and unions representing their workers have reached a \"tentative agreement\" to avert the first national rail strike in 30 years.</p>\r\n\r\nThe deal follows months of back and forth negotiations and 20 hours of overnight talks on working conditions.\r\n\r\nPresident Joe Biden hailed the outcome as \"an important win for our economy and the American people\".\r\n\r\nThe strike would have impacted millions of Americans and cost the economy an estimated $2bn (£1.7bn) a day.\r\n\r\nIt would also have disrupted passenger services, as many of these trains run on tracks that are operated and maintained by freight carriers.\r\n\r\nThe agreement, which was announced early on Thursday, ensures that a strike that had been due to begin after midnight on Friday will no longer take place.\r\n\r\nThe deal includes a 24% wage increase and $5,000 bonuses, as well as changes to existing policies on time off which had been a crucial sticking point for workers.\r\n\r\n\"This is a win for tens of thousands of workers and for the dignity of their work,\" Mr Biden said at a news conference. \"They earned and deserve these benefits, and this is a great deal for both sides.\"\r\n\r\n\"We reached an agreement that will keep our critical rail system working and avoid disruptions of our economy,\" he added.\r\n\r\nAre we now in a \'golden age\' for trade unions?\r\nGen Z fights for unions, one Starbucks at a time\r\nA sleeping American giant now spoiling for a fight\r\nHeated contract negotiations have been taking place for three years between railroad management and the dozen unions that represent more than 100,000 workers.\r\n\r\nTen unions had agreed to the most recent contract offer, but until Thursday two of the largest unions in the country - representing the engineers and conductors who make up two-person train crews - held out.\r\n\r\nThey complained that staffing shortages and workplace attendance policies have created punishing schedules for staff.\r\n\r\nWorkers say they are effectively on call throughout the year, with no paid time off in some cases even if they are unwell or have other personal emergencies.\r\n\r\nMore than one million Americans worked on the railroads in the 1950s, but the industry now employs fewer than 150,000 people, according to data from the Bureau of Labour Statistics.\r\n\r\nCost-cutting has led to the culling of some 45,000 jobs over the last six years, putting pressure on those who have remained in their jobs.\r\n\r\nAnalysts had warned a strike would result in supply chain chaos and cost the economy more than $2bn a day. In anticipation of service interruption, the Amtrak passenger rail service cancelled all of its long-distance services around the country for Thursday.\r\n\r\nPresident Biden personally called rail unions and companies earlier in the week. Labour Secretary Marty Walsh, a former union leader himself, secured the deal after the marathon talks.\r\n\r\nThe two holdout unions, BLET and Smart, credited the duo and other Democrats for \"allowing for an agreement to be reached across the bargaining table, rather than through legislation\".\r\n\r\n\"The solidarity shown by our members, essential workers to this economy, who keep America\'s freight trains moving, made the difference,\" it added.\r\n\r\nThe agreement will now go before union members for a ratification vote.\r\n\r\nThe parties have also agreed that, if the vote fails, there will be a \"cooling off period\" before any strike action is taken.',1,'15 Sep 2022',''),(5,'Twitter sued by Dutch town Bodegraven-Reeuwijk over paedophilia rumour','<p>Twitter sued by Dutch town Bodegraven-Reeuwijk over paedophilia rumour</p>\r\n<p>False reports that Bodegraven-Reeuwijk was the site of the abuse and murder of multiple children in the 1980s were first circulated by three men in 2020.</p>\r\n<p>The main instigator, who grew up in the town near The Hague, said he had witnessed the crimes as a child.</p>\r\n<p>Local authorities want to see all posts relating to the alleged events removed.</p>\r\n<p>The claims have prompted dozens of people to travel to the town\'s Vrederust cemetery to leave flowers and tributes at the graves of seemingly random dead children.</p>\r\n<p>Twitter\'s lawyer, Jens van den Brink, declined to comment ahead of a hearing at The Hague District Court on Friday.</p>\r\n<p>Last year, the same court ordered the three original men to remove all tweets about the town, but the claims continue to circulate.</p>\r\n<p>The town\'s lawyer, Cees van de Sanden, said Twitter had not responded to a request in July that it find and remove all posts related to the claims.</p>\r\n<p>Mayor Christiaan van der Kamp said that claims were \"very painful and sometimes even threatening for the relatives of the deceased\", RTL Nieuws reported.</p>\r\n<p>The three men behind the claims are currently serving jail sentences following convictions in separate cases for incitement and making death threats against a number of people, including Dutch Prime Minister Mark Rutte.</p>',4,'19 Sep 2022','dutchtown.jpg'),(6,'The first PopCon Middle East will take place from November 10 to 13.','<p> 5 hours ago \r\nThe first PopCon Middle East will take place from November 10 to 13.\r\nThe first PopCon Middle East will take place from November 10 to 13.</p>\r\n<p>The event is a showcase of all the best movies, TV, comics, graphic novels, anime, cosplay and more.</p>\r\n<p>“I have been a fan of comic books since I was a child and have been entrenched in the community from an early age,” said Amer Rashed Al Farooq, deputy chief executive of Speedy Comics, one of the organisers.</p>\r\n<p>This is a dream come true for a true geek like me. I want this convention to have everything and more my geek heart desires.”\r\nPopCon will be running as part of Dubai Esports Festival, from November 9 to 29. It will span one weekend, from November 10 to 13.</p>\r\n<p>The event will take place at the Dubai Exhibition Centre in Expo City Dubai, in partnership with Dubai Festivals and Retail Establishment, Speedy Comics and Alanza Trading.</p>\r\n<p>As part of the event, there will be exclusive workshops, movie screenings and cosplay competitions, to name a few. Limited-edition merchandise will also be on sale in a section called Artist Alley.</p>\r\n<p>Fans will come face to face with some of their favourite celebrities and get the opportunity to meet like-minded pop culture fans.</p>\r\n<p>Competitions will include People’s Choice Cosplay, a Dungeons & Dragons game and Pokemon/Yu-Gi-Oh! Card tournament.</p>\r\n<p>Further details will be revealed closer to the time. There will be the Playground, a gaming area designed for people to play their favourite consoles, PC games and more. Group challenges will also take place here.</p>\r\n<p>Parents can leave their little ones at the Children’s Island, where there’s a play area and activities.</p>\r\n<p>The Dojo is where workshops focusing on film production, voice and theatre acting will take place.</p>\r\n<p>There will also be a cinema, gallery area and marketplace.</p>\r\n<p>The biggest names confirmed so far include A Nightmare on Elm Street actress Katie Cassidy, who also played demon Ruby in the fantasy horror series Supernatural.</p>\r\n<p>Osric Chau, who played Kevin Tran in Supernatural, will also be there, as well as voice actor Ray Porter, who took on the role of Darkseid in Zack Snyder’s Justice League.</p>\r\n<p>Renowned international artists who will be attending are African-Native American Afua Richardson, whose work includes covers for five issues of Marvel’s World of Wakanda, and Marvel and DC comics artist Mostafa Moussa.</p>\r\n<p>More talent will be announced soon.</p>\r\n<p>The Tavern is the place to grab a bite to eat or drink.</p>',5,'19 Sep 2022','popcon.jpg'),(8,'Prince Harry and Prince William in show of unity as they walk together in procession','<p>Prince Harry and Prince William put on a show of unity as they honoured their late grandmother Queen Elizabeth II on the day of her funeral. The Duke of Sussex and the Prince of Wales looked sombre as they walked behind the late sovereign\'s coffin, taken from Westminster Hall to Westminster Abbey ahead of the funeral. </p>\r\n<p>Harry and William\'s show of force comes after the brothers, whose relationship has been reportedly strained over the past few years, have made a number of public appearances together since the passing of the Queen.</p>\r\n<p>On September 10, the sons of King Charles III and Princess Diana stepped out in Windsor accompanied by their wives to view tributes left by mourners and meet well-wishers.</p>\r\n<p>Meghan, Duchess of Sussex, and Prince Harry were spotted shaking hands and speaking with several members of the public.</p>\r\n<p>A few days later, last Wednesday, the brothers attended a poignant ceremony at Westminster Hall, after the Queen\'s coffin had been transported there from Buckingham Palace.</p>\r\n<p>On Saturday, William and Harry joined forces once again as they took part in an extremely emotional vigil at the Hall, while thousands of mourners were lining up to pay their respect.</p>\r\n<p>Standing by the opposite sides of the Queen\'s coffin at Westminster Hall, the brothers were accompanied by their six cousins as they honoured the sovereign.</p>\r\n<p>Prince Harry, who stepped down as working royal in the spring of 2020, was allowed by King Charles to wear his military uniform on this occasion.</p>\r\n<p>The Duke, who has served for 10 years in the Army and carried out two tours in Afghanistan, had not been seen wearing his military regalia since March two years ago, as a consequence of his changed position within the Firm.\r\n\r\n</p>\r\n<p>The once strong bond between Harry and William started showing cracks in 2019, when the Duke, asked by journalist Tom Bradby about rumours of tensions, said he would always love his brother but they were on \"different paths\".</p>\r\n<p>The Queen’s coffin, which had been lying in state for four days at Westminster Hall, was taken by pallbearers to be placed on the Royal Navy State Funeral Gun carriage just after 10.30am.</p>\r\n<p>The coffin was carried from New Palace Yard towards Westminster Abbey on the gun carriage, departing just before 10.45am</p>\r\n<p>Members of the Royal Family, led by King Charles III, followed on foot behind.</p>\r\n<p>The route through Parliament Square, Broad Sanctuary and the Sanctuary was lined by Royal Navy personnel and Royal Marines.</p>\r\n<p>The coffin was carried inside the Abbey by the bearer party of Grenadier Guards ahead of the state funeral service.</p>\r\n<p>The service, conducted by the Very Reverend Dr David Hoyle Dean of Westminster, began at 11am.</p>\r\n<p>The sermon will be preached by the Most Reverend and Right Honourable Justin Welby, Archbishop of Canterbury.</p>\r\n<p>After the funeral, the Queen\'s coffin will travel in procession from Westminster Abbey to Wellington Arch, also known as Constitution Arch, which was built as an original entrance to Buckingham Palace and sits between the corners of Hyde Park and Green Park.</p>\r\n<p>From there, the coffin will travel to Windsor, where a committal service will be held at St George\'s Chapel.</p>\r\n<p>Queen Elizabeth II will be laid to rest in the King Goerge VI memorial chapel, a small annexe to the main chapel at Windsor.</p>',6,'23 Sep 2022','royalfamily.jpg'),(9,'The World’s Best Restaurant 2022 : Geranium','<p>A Copenhagen icon: Located on the eighth floor overlooking the beautiful Fælledparken gardens, Geranium invites guests to taste nature while simultaneously observing it around them. The locally-inspired, seasonally-changing ‘Universe’ tasting menu takes place over a minimum of three hours with around 20 courses split evenly between appetisers, savoury dishes and sweets. Since making Geranium the first Danish restaurant to win three Michelin stars in 2016, co-owners Rasmus Kofoed and Søren Ledet have never rested on their laurels, keeping it fresh and exciting for regulars and destination diners alike. In 2022 they reach the zenith of their careers, with Geranium named The World’s Best Restaurant, sponsored by S.Pellegrino & Acqua Panna.</p>\r\n<p>Meatless menu: Five years after he stopped eating meat, in 2022 Kofoed made Geranium a meat-free zone, focusing solely on local seafood and vegetables from organic and biodynamic farms in Denmark and Scandinavia. Artful creations on the ‘Spring Universe’ menu include lightly smoked lumpfish roe with milk, kale and apple, and forest mushrooms with beer, smoked egg yolk, pickled hops and rye bread. Each dish is an intricate work of art served on nature-inspired crockery.</p>\r\n<p>Masters of hospitality: A natural-born people-person, charming host and outstanding sommelier, Ledet welcomes each guest into Geranium like family and makes them feel at home for the duration of their meal. His constantly-evolving drinks programme and warm service style helped the restaurant to win the Art of Hospitality Award in 2018. His extensive wine list focuses on low-manipulation labels to complement Kofoed’s food, and there’s a unique and refreshing juice pairing featuring creations such as rhubarb with geranium and carrot.</p>\r\n<p>Scandi vibes: With panoramic park views and a glimpse of the national soccer stadium next door, Geranium’s dining room is a large, light and airy space with direct access to the chefs in the open kitchen. For special occasions, diners can request the fireplace table overlooking the park, or the larger private dining room and Inspiration Kitchen. The whole multi-space restaurant features open fires, blonde wood and modern Scandinavian décor. It’s a world-leading setting for officially the world’s leading restaurant.</p>',7,'23 Sep 2022','geranium.jpg'),(10,'James Cameron Scrapped An Avatar 2 Script He Spent A Year Writing','<p>James Cameron, the mastermind behind 2009\'s Avatar, reveals he spent an entire year writing a script for Avatar 2, only to toss it out in the end.</p>\r\n<p>James Cameron worked for a year on an Avatar: The Way of Water script, which he ended up throwing away. With an impressive slate of films behind him including Titanic, The Terminator, Aliens, and Avatar, Cameron has four sequels to Avatar in the works. The Oscar-winning director created the highest-grossing movie of all time with 2009\'s Avatar, so the hype for his sequels is high. After 12 years, the overwhelming response to the Avatar 2 trailer proved that fans are eagerly awaiting a return to the franchise, which will pick up where the previous film left off with the same characters played by Sam Worthington and Zoe Saldaña.</p>\r\n<p>With a massively successful first installment, there is understandably a lot of pressure on Cameron and the crew to deliver a sequel that honors the original while revitalizing the Avatar franchise with a fresh story. Previously, he spoke about the writing process for Avatar 2, indicating that the writers were eager to contribute new ideas that expanded the franchise. Though Cameron is also looking forward to bringing new ideas to the table, he was dead set on keeping a strong connection to the original film, so much so that he threatened to fire the writers in order to keep them focused, according to the director himself.</p>\r\n<p>In a conversation with The Times UK, Cameron speaks more about his writing process, admitting that he threw away a year\'s worth of work because the script wasn\'t up to his standard for Avatar. The writer/director explains that Avatar films should work on three levels, and his discarded Avatar script only managed a portion. See Cameron\'s full quote below:</p>\r\n<p>“All films work on different levels. The first is surface, which is character, problem and resolution. The second is thematic. What is the movie trying to say? But ‘Avatar’ also works on a third level, the subconscious. I wrote an entire script for the sequel, read it and realized that it did not get to level three. Boom. Start over. That took a year.”</p>\r\n<p>Cameron\'s comments prove his determination to get Avatar 2 right at all costs, as well as his confidence in the film. The director is so certain about the direction of the franchise that he was prepared to throw away a year of work and start from scratch, which bodes well for the final product. After 12 years, it makes sense that Cameron wanted to ensure that the film perfectly encapsulates everything that Avatar is about. As Cameron describes it, the original film contains all the surface elements that make up a film, as well as thematic ones with its environmental themes. The subconscious level the filmmaker refers to are likely the parts of the historic film that speak to the human psyche through its combination of its visuals, ambiance, and more. As the Avatar universe expands with four sequels, it will be interesting to see how Cameron\'s intensive approach holds up.</p>\r\n<p>Cameron\'s passion for the Avatar franchise is palpable, and encouraging for fans looking forward to returning to Avatar after more than a decade. The filmmaker has previously said that Avatar: The Way of Water will be unpredictable and move in unexpected directions, which will hopefully go a long way in renewing the public\'s enthusiasm when the film is released. The original Avatar is set for a theatrical re-release this month, which will likely build more hype for the sequel when it finally arrives in December.</p>',14,'23 Sep 2022','avatar.jpeg'),(11,'The Formula 1 records that Verstappen can break this season','<p>Winning a second consecutive title isn\'t the only thing Verstappen can accomplish this year</p>\r\n<p>The upcoming Singapore Grand Prix could witness Max Verstappen being crowned a world champion for a second year running.\r\n\r\n</p>\r\n<p>While it remains a long shot and Japan would be a more likely venue to bring out the champagne, a bad day for Ferrari could pave the way for the Dutchman to wrap things up with five rounds left to go.</p>\r\n<p>While a second title seems almost academic Verstappen can achieve even a few more records this year.</p>\r\n<p>umber of points</p>\r\n<p>Lewis Hamilton, the Red Bull driver\'s rival from last year, holds the record for points in a season.</p>\r\n<p>He accumulated 413 points in a 21-race season in 2019. With a maximum of 160 points left on the table this year, with the fastest laps and a sprint race to also be contested it is not unreasonable to think that can beat Hamilton\'s record if he keeps up his current form.</p>\r\n<p>Distance between first and second\r\n</p>\r\n<p>In 2013, Sebastian Vettel won the World Championship at a canter finishing 155 points ahead of Fernando Alonso.\r\n\r\n</p>\r\n<p>Verstappen has a chance in the six remaining races to open a gap equal to or greater than than German\'s.\r\n\r\n</p>\r\n<p>Winning streak\r\n</p>\r\n<p>Vettel won nine consecutive races in 2013 winning every race It was between Belgium and Brazil.\r\n\r\n</p>\r\n<p>Verstappen is currently on a run of five and, with the Dutchman looking in imperious form, can challenge another one of Vettel\'s records.\r\n\r\n</p>\r\n<p>With 11 victories already this year, Verstappen is on course to claim the most wins in a single season with the record currently held by German pair Sebastian Vettel and Michael Schumacher.\r\n\r\n</p>\r\n<p>Fastest laps\r\n</p>\r\n<p>Schumacher and Kimi Raikkonen had ten fastest laps in a single season each. Verstappen has five, while this would represent the toughest challenge of all this year, it still remains on the cards.\r\n\r\n</p>',3,'23 Sep 2022','formula1.jpg'),(12,'Olivia Wilde Addresses Shia LaBeouf, Florence Pugh and Harry Styles, Chris Pine’s Spit-Gate','<p>Wilde directed \'Don\'t Worry Darling,\' which hits theaters Friday and has been the subject of much media intrigue.\r\n\r\n</p>\r\n<p>Olivia Wilde doesn’t want Stephen Colbert to worry about the various rumors surrounding her new movie.\r\n\r\n</p>\r\n<p>The Don’t Worry Darling director and actress was a guest on CBS’ The Late Show on Wednesday ahead of the Warner Bros. film’s release this Friday, where she addressed several of the rumors surrounding the project, starting with those surrounding Shia LaBeouf’s departure from the project.\r\n\r\n</p>\r\n<p>In early September, LaBeouf came forward and countered Wilde’s claims that he had been fired from Don’t Worry Darling, saying that he quit the film instead and providing texts and videos that showed her asking him to stay in the cast.\r\n\r\n</p>\r\n<p>When asked by Colbert to clarify whether LaBeouf quit or was fired from the film, Wilde said that she tried to play mediator between the actor and her lead actress, Florence Pugh.\r\n\r\n</p>\r\n<p>“Once it became clear that it was not a tenable working relationship, I was given an ultimatum,” she told the late night host. “I chose my actress, which I’m very happy I did. At the time, was I bummed that we weren’t able to make it work? Sure. Did information about him come to light later that made me confident we made the right decision? Absolutely.”\r\n\r\n</p>\r\n<p>Colbert then pushed her to clarify why LaBeouf thinks he quit, while she thinks he was fired, to which she replied that the way it happened, they both felt like they were moving on without the other.\r\n\r\n</p>\r\n<p>Next up, the director discussed the so-called Spit-Gate speculation that had surrounded a viral video and led social media users to question whether Harry Styles spat on co-star Chris Pine during the film’s premiere screening earlier this month at the Venice Film Festival.\r\n\r\n</p>\r\n<p>“Another one of our weird rumors, Spit-Gate, which you might have heard about, is I think …” Wilde said before Colbert cut her off.\r\n\r\n</p>\r\n<p>The host made it clear he had wanted to ask Wilde about the furor and appeared to read from his notecard: “Did Harry Styles spit on Chris Pine? Why or why not? Support your answer.”\r\n\r\n</p>\r\n<p>Wilde laughed and replied, “No, he did not. But I think it’s a perfect example of, like, people will look for drama anywhere they can. Harry did not spit on Chris, in fact …”\r\n\r\n</p>\r\n<p>Colbert again interrupted her to quip, “Only time will tell.”\r\n\r\n</p>\r\n<p>Pine’s team previously issued a statement emphatically denying that Styles spat on him. Additionally, Styles poked fun at the debate during a recent performance at Madison Square Garden.\r\n\r\n</p>\r\n<p>Finally, Wilde addressed the rumors that she and Pugh are “feuding.”\r\n\r\n</p>\r\n<p>“I have nothing but respect for Florence’s talent,” she told Colbert. “She’s fantastic. She’s on the set of her movie Dune right now, and there’s nothing cooler than a busy actress. I have nothing against her for any reason.”\r\n\r\n</p>\r\n<p>She went on to explain that she finds it interesting that none of her fellow male directors are being asked questions about their cast, and the host agreed with her.\r\n\r\n</p>\r\n<p>“People would actually be talking about the movie itself,” Wilde said. “They’re praised for being tyrannical. They can be investigated time and time again, it still doesn’t overtake conversations of their actual talent or about the films themselves. This is something we’ve come to expect. It is just very different standards that are created for women and men in the world at large.”\r\n\r\n</p>',14,'23 Sep 2022','olivia.jpg');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23 19:47:44


-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: assignment1
-- ------------------------------------------------------
-- Server version 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(5000) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `article_id` int DEFAULT NULL,
  `likePost` tinyint(1) DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `comment_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_c_users` (`user_id`),
  KEY `fk_c_article` (`article_id`),
  KEY `fk_c_administrators` (`admin_id`),
  CONSTRAINT `fk_c_administrators` FOREIGN KEY (`admin_id`) REFERENCES `administrators` (`admin_id`),
  CONSTRAINT `fk_c_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  CONSTRAINT `fk_c_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'A legend of the game',1,1,1,NULL,'23 Sep 2022'),(2,'His films are good',1,2,1,NULL,'23 Sep 2022'),(3,'The strike is averted? Good',1,3,0,NULL,'23 Sep 2022'),(4,'A major problem : lack of privacy',1,5,1,NULL,'23 Sep 2022'),(5,'Middle east knows tourism promotion',1,6,1,NULL,'23 Sep 2022'),(6,'Brothers together',1,8,1,NULL,'23 Sep 2022'),(7,'Would love to dine there',1,9,1,NULL,'23 Sep 2022'),(8,'Not so hyped up yet but let us see',1,10,0,NULL,'23 Sep 2022'),(9,'Records are meant to be broken',1,11,1,NULL,'23 Sep 2022'),(10,'Celebrities and their mess',1,12,0,NULL,'23 Sep 2022'),(11,'Will be down in history books',2,1,1,NULL,'23 Sep 2022'),(12,'President talks',2,3,0,NULL,'23 Sep 2022'),(13,'Popcon would be fun',2,6,1,NULL,'23 Sep 2022'),(14,'Gotta go someday',2,9,1,NULL,'23 Sep 2022'),(15,'Formula 1 is fun',2,11,0,NULL,'23 Sep 2022'),(16,'Probably the best, everyone',NULL,1,0,1,'23 Sep 2022'),(17,'Zac works really hard as well',NULL,2,0,1,'23 Sep 2022'),(18,'An event worth attending',NULL,6,0,1,'23 Sep 2022'),(19,'Sometimes it&#039;s sorrow that brings unity',NULL,8,0,1,'23 Sep 2022'),(20,'Verstappen is a formula 1 great',NULL,11,0,1,'23 Sep 2022'),(21,'Everyone has their own issues',NULL,12,0,1,'23 Sep 2022'),(22,'He has been under the radar',3,2,0,NULL,'23 Sep 2022'),(23,'They should be brought to justice',3,5,0,NULL,'23 Sep 2022'),(24,'Family photo looks good',3,8,1,NULL,'23 Sep 2022'),(25,'A much anticipated movie',3,10,1,NULL,'23 Sep 2022'),(26,'Not a movie without problem',3,12,1,NULL,'23 Sep 2022'),(27,'Farewell to one of the best of the game',4,1,1,NULL,'23 Sep 2022'),(28,'Beautiful faces will be seen',4,6,1,NULL,'23 Sep 2022'),(29,'Looks good ambience',4,9,1,NULL,'23 Sep 2022'),(30,'Strikes should always be solved as soon as possible',NULL,3,0,7,'23 Sep 2022'),(31,'A proper investigation is necessary',NULL,5,0,7,'23 Sep 2022'),(32,'Presentations and impressions matter a lot too',NULL,9,0,7,'23 Sep 2022'),(33,'Movie that brings new ideas in cinema world',NULL,10,0,7,'23 Sep 2022'),(34,NULL,2,2,1,NULL,NULL),(35,NULL,2,5,1,NULL,NULL),(36,NULL,2,8,1,NULL,NULL),(37,NULL,2,10,1,NULL,NULL),(38,NULL,2,12,1,NULL,NULL),(39,NULL,3,1,1,NULL,NULL),(40,NULL,3,6,1,NULL,NULL),(41,NULL,3,11,1,NULL,NULL),(42,NULL,3,9,1,NULL,NULL),(43,NULL,4,2,1,NULL,NULL),(44,NULL,4,11,1,NULL,NULL),(45,NULL,4,10,1,NULL,NULL),(46,NULL,4,8,1,NULL,NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23 19:47:44
