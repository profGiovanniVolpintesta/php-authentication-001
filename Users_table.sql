DROP table user_rights;
DROP table rights;
DROP table users;
DROP table users_types;

CREATE TABLE users_types (
	name varchar(30) primary key
);

CREATE TABLE users (
	id integer auto_increment primary key,
    username varchar(100) unique not null,
    password varchar(100) not null,
    userType varchar(30) not null,
    FOREIGN KEY (userType) REFERENCES users_types(name)
);

CREATE TABLE rights (
    name varchar(30) primary key
);

CREATE TABLE user_rights (
	userType varchar(30),
    rights varchar(30),
    PRIMARY KEY (userType, rights),
    FOREIGN KEY (userType) REFERENCES users_types(name),
    FOREIGN KEY (rights) REFERENCES rights(name)
);

INSERT INTO users_types(name)
VALUES ("OWNER"),
("COACH"),
("USER");

INSERT INTO users(username, password, userType)
VALUES ("giovanni.volpintesta", "gv", "OWNER"),
("giuseppe.grasso", "gg", "COACH"),
("alice", "aa", "USER");

INSERT INTO rights(name)
VALUES ("USER_VISUALIZE"),
("USER_CREATE"),
("COACH_VISUALIZE"),
("COACH_CREATE");

INSERT INTO user_rights(userType, rights)
VALUES ("OWNER", "USER_VISUALIZE"),
("OWNER", "USER_CREATE"),
("OWNER", "COACH_VISUALIZE"),
("OWNER", "COACH_CREATE"),
("COACH", "USER_VISUALIZE"),
("COACH", "USER_CREATE"),
("COACH", "COACH_VISUALIZE"),
("USER", "COACH_VISUALIZE");

select * from users_types;
select * from users;
select * from rights;
select * from user_rights order by user_rights.userType, user_rights.rights;

SELECT username FROM users WHERE username = 'giovanni.volpintesta' AND password = 'gv';