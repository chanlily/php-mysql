CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `isadmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) DEFAULT NULL,
  `sort` smallint(5) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cName` (`cName`)
)
CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned,
  `author` varchar(20),
  `pageName` varchar(255) NOT NULL,/*文章名称*/
  `pageView` int(10) unsigned DEFAULT '0',/*浏览次数*/
  `pageDesc` text,/*浏览详情*/
  `pageUpTime`  VARCHAR (20) NOT NULL,,/*更新时间*/
  `isShow` tinyint(1) DEFAULT '1',
  `isHot` tinyint(1) DEFAULT '0',
  `cateId` smallint(5) unsigned NOT NULL,/*分类*/
  `sort` smallint(5) unsigned DEFAULT '1',
  `intro` varchar(255),
   `image` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` tinyint(1) DEFAULT '2',/*男1,女0,保密2*/,
  `email` varchar(50) NOT NULL,
  `regTime` VARCHAR (20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
