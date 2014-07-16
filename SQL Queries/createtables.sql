CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(225) NOT NULL,
  email varchar(225) NOT NULL,
  slug varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  password_version TINYINT NOT NULL,
  PRIMARY KEY (id),
  KEY (slug),
  KEY (username),
  KEY (email)
);

CREATE TABLE user_meta (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  website varchar(225) NOT NULL,
  about TEXT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) 
    REFERENCES user(id)
    ON DELETE CASCADE
);

CREATE TABLE tweet (
  id BIGINT NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  tweet TEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) 
    REFERENCES user(id)
    ON DELETE CASCADE
);

CREATE TABLE follow (
  id BIGINT(11) NOT NULL AUTO_INCREMENT,
  source_id int(11) NOT NULL,
  target_id int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (source_id) 
    REFERENCES user(id)
    ON DELETE CASCADE,
  FOREIGN KEY (target_id) 
    REFERENCES user(id)
    ON DELETE CASCADE
);