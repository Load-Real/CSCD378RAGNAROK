-- create database for the site
create database ragnarok_db;
use ragnarok_db;

-- create table that will hold the user info
create table users(
    id int unique AUTO_INCREMENT,
    username varchar(20) unique not null,
    password char(32) not null,
    dateJoined date,
    admin boolean,
    registered boolean
);
-- create table for storing errors
create table error_log(
    id int unique AUTO_INCREMENT,
    IPAddress varchar(100),
    errorTime    time,
    errorDate    date,
    errorMessage varchar(2000)
);
-- create table for keeping track of who logs in and out
create table login_log(
    id int unique AUTO_INCREMENT,
    IPAddress varchar(100),
    loginUser varchar(50),
    loginTime time,
    loginDate date,
    loginMessage varchar(100)
);

-- create admins + 1 non-admin
insert into users (username,password,dateJoined,admin) values ("andrew","5f4dcc3b5aa765d61d8327deb882cf99","2022-01-30",true);
insert into users (username,password,dateJoined,admin) values ("louden","4a7d1ed414474e4033ac29ccb8653d9b","2022-01-30",true);
insert into users (username,password,dateJoined,admin) values ("zach","5f4dcc3b5aa765d61d8327deb882cf99","2022-01-30",true);
insert into users (username,password,dateJoined,admin) values ("mathew","4a7d1ed414474e4033ac29ccb8653d9b","2022-01-30",true);
insert into users (username,password,dateJoined,admin) values ("chris","5f4dcc3b5aa765d61d8327deb882cf99","2022-02-10",false);
insert into users (username,password,dateJoined,admin) values ("scott","5f4dcc3b5aa765d61d8327deb882cf99","2022-02-10",true);

