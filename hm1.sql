  CREATE TABLE articles (
  id integer primary key auto_increment,
  titolo varchar(256) NOT NULL,
  contenuto text NOT NULL,
  writtenBy varchar(255) DEFAULT NULL
) ENGINE=InnoDB;

CREATE TABLE users (
  id integer primary key auto_increment ,
  username varchar(16) not null unique,
  password varchar(255) not null,
  email varchar(255) not null unique,
  name varchar(255) not null,
  surname varchar(255) not null,
  picprofile varchar(255) DEFAULT NULL
) ENGINE=InnoDB;
