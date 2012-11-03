CREATE TABLE dt_users 
(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    user_email VARCHAR(50) NOT NULL,
    last_activity DATETIME,
    added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    active BOOLEAN
);

CREATE TABLE dt_words
(
    word_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    word_value VARCHAR(50) NOT NULL,
    description VARCHAR(50)
);

CREATE TABLE dt_roles
(
    role_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

CREATE TABLE dt_usersinroles
(
    role_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (role_id,user_id)
);

CREATE TABLE dt_userprofile
(
    userprofile_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    display_name VARCHAR(50),
    alternate_email VARCHAR(50),
    website VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES dt_users(user_id)
);

CREATE TABLE dt_userwords
(
    word_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (word_id,user_id)
);

CREATE TABLE dt_wordstest
(
    wordtest_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    tested_count INT NOT NULL,
    failed_count INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES dt_users(user_id)
);

CREATE TABLE dt_wordtestlist
(
   wordtest_id INT NOT NULL,
   word_id INT NOT NULL,
   passed BOOLEAN NOT NULL,
   PRIMARY KEY (wordtest_id,word_id)
);

INSERT INTO dt_users(user_email,active) VALUES('lomsey@gmail.com',1);
INSERT INTO dt_users(user_email,active) VALUES('rusty.loy@gmail.com',1);