CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(128) NOT NULL,
  slug varchar(128) NOT NULL,
  password varchar(225) NOT NULL,
  PRIMARY KEY (id),
  KEY slug (slug)
);

CREATE TABLE tweet (
  id BIGINT NOT NULL AUTO_INCREMENT,
  
);