# php-gallery

## SQL Table(s)
```
CREATE TABLE gallery (
    postID int(11) unsigned NOT NULL AUTO_INCREMENT, 
    name varchar(20) NOT NULL, 
    title varchar(70) NOT NULL, 
    content text NOT NULL, 
    datetime int(11) NOT NULL, 
    pic varchar(30) NOT NULL, 
    ipaddr varchar(16) NOT NULL, 
    views int(11) NOT NULL default '0', 
    PRIMARY KEY (postID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
```
