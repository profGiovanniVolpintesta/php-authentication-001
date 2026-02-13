DROP table users;

CREATE TABLE users (
	id integer auto_increment primary key,
    username varchar(100) unique not null,
    password varchar(100) not null
);

CREATE TABLE rights (
    id integer auto_increment primary key,
    name varchar(30) unique not null
);

CREATE TABLE user_rights (

	userId integer,
    rightId integer,
    PRIMARY KEY (userId, rightId),
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (rightId) REFERENCES rights(id)
);

INSERT INTO users(username, password)
VALUES ("giovanni.volpintesta", "gv"),
("giuseppe.grasso", "gg"),
("alice", "aa");

INSERT INTO rights(name)
VALUES ("USER_CREATE"),
("COACH_CREATE");

INSERT INTO user_rights(userId, rightId)
VALUES (1, 1),
(1, 2),
(2, 2);

select * from users;

SELECT username FROM users WHERE username = 'giovanni.volpintesta' AND password = 'gv';