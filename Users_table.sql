CREATE TABLE users (
    username varchar(100) primary key,
    password varchar(100)
);

INSERT INTO users(username, password)
VALUES ("giovanni.volpintesta", "gv"),
("giuseppe.grasso", "gg"),
("mario.rossi", "mr");