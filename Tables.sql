SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS Forum;
DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS Subject;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE Users
(username VARCHAR(16) NOT NULL PRIMARY KEY,
firstname VARCHAR(32) NOT NULL,
lastname VARCHAR(32) NOT NULL,
email VARCHAR(64) UNIQUE NOT NULL,
password VARCHAR(64) NOT NULL,
date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
bio VARCHAR(128),
verified INTEGER NOT NULL DEFAULT 0);

CREATE TABLE Subject
(s_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
s_title VARCHAR(8) UNIQUE NOT NULL,
s_name VARCHAR(64) UNIQUE NOT NULL);

CREATE TABLE Message
(m_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
from_username VARCHAR(16) NOT NULL,
to_username VARCHAR(16) NOT NULL,
m_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
m_text VARCHAR(256) NOT NULL,
FOREIGN KEY (from_username)
	REFERENCES Users (username)
	ON DELETE CASCADE,
FOREIGN KEY (to_username)
	REFERENCES Users (username)
	ON DELETE CASCADE);
	
CREATE TABLE Forum
(f_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
creator_username VARCHAR(16) NOT NULL,
f_title VARCHAR(32) NOT NULL,
f_text VARCHAR(64), # this attribute can be null, forums dont need text, a title is good enough
f_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
forum_subject_id INTEGER UNSIGNED NOT NULL,
tag VARCHAR(16),
FOREIGN KEY (creator_username)
	REFERENCES Users (username)
	ON DELETE CASCADE,
FOREIGN KEY (forum_subject_id)
	REFERENCES Subject (s_id)
	ON DELETE CASCADE);
	
CREATE TABLE Comments
(c_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
comment_forum_id INTEGER UNSIGNED NOT NULL,
parent_comment_id INTEGER UNSIGNED,
creator_username VARCHAR(64) NOT NULL,
c_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
comment_text VARCHAR(256) NOT NULL,
is_reported INTEGER NOT NULL DEFAULT 0,
FOREIGN KEY (comment_forum_id)
	REFERENCES Forum (f_id)
	ON DELETE CASCADE,
FOREIGN KEY (parent_comment_id)
	REFERENCES Comments (c_id)
	ON DELETE CASCADE,
FOREIGN KEY (creator_username)
	REFERENCES Users (username)
	ON DELETE CASCADE);
#insertion for testing purposes
#INSERT INTO Users SET `username` = "RandomPerson", `firstname` = "Random", `lastname` = "Person", `email` = "RandomPerson@hotmail.com", `password` = "RandomPerson";
#INSERT INTO Subject(s_title, s_name) VALUES ("CSC260", "Data structures");
#INSERT INTO Forum(creator_username, f_title, f_text, forum_subject_id, tag) VALUES ('bhatfield', 'Normalization', 'How does one normalize anything???', 8, 'Normalization');
#INSERT INTO Comments(`comment_forum_id`, `creator_username`, `comment_text`) VALUES (6,"Kevinanona2","The Karnaugh map is a method of simplifying Boolean algebra expressions")
