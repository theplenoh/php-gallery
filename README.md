# php-gallery

## SQL Table(s)
CREATE TABLE gallery (
    postID int(11) unsigned NOT NULL AUTO_INCREMENT, 
    name varchar(20) NOT NULL, 
    title varchar(70) NOT NULL, 
    content text NOT NULL, 
    datetime int(11) NOT NULL, 
    pic varchar(30) NOT NULL, 
    PRIMARY
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
